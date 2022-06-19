<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
/**
* Directorio.
*
* @link       https://github.com/Efraimcat/wpfunos/
* @since      1.0.0
*
* @package    Wpfunos
* @subpackage Wpfunos/estadisticas
* @author     Efraim Bayarri <efraim@efraim.cat>
*/
class Wpfunos_Estadisticas {
	private $plugin_name;
	private $version;
	public function __construct( $plugin_name, $version ) {
		$this->plugin_name = $plugin_name;
		$this->version = $version;
		add_action( 'admin_head', array( $this, 'my_custom_admin_head'));
		add_filter( 'wpfunos_estadisticas_date', array( $this, 'wpfunos_stats_date'),10, 9 );
		add_filter( 'wpfunos_estadisticas_cp', array( $this, 'wpfunos_stats_CP'),10, 5 );
		add_filter( 'wpfunos_estadisticas_semana_mes', array( $this, 'wpfunos_stats_semana_mes'),10, 6 );
	}

	/*********************************/
	/*****  ESTADÍSTICAS        ******/
	/*********************************/
	/*
	* $type 'day'(same day), 'week'(7 days). 'month'(30 days), 'all'
	*
	*/
	public function wpfunos_stats_date( $cpt, $type = 'day', $status = 'publish', $metakey = 'wpfunos_Dummy', $metavalue = true, $inicio = '1 March 2021', $metakey2 = 'wpfunos_Dummy', $metavalue2 = true, $unicos = false ){
		$ahora = new DateTime();
		$dia = new DateTime();
		$semana = new DateTime();
		$mes = new DateTime();
		$siempre = new DateTime();
		$dia->sub(new DateInterval('P1D'));
		$semana->sub(new DateInterval('P7D'));
		$mes->sub(new DateInterval('P30D'));
		$siempre->setTimestamp( strtotime( $inicio ) );
		if( !$unicos ){
			$metakeyunicos = 'wpfunos_Dummy';
		}else{
			switch ($cpt){
				case 'usuarios_wpfunos': $metakeyunicos = 'wpfunos_userVisitas'; break;
				case 'ubicaciones_wpfunos': $metakeyunicos = 'wpfunos_ubicacionVisitas'; break;
				case 'pag_serv_wpfunos': $metakeyunicos = 'wpfunos_entradaServiciosVisitas'; break;
			}
		}
		$resultados = 0;
		switch ( $type ){
			case 'day': $cuando = $ahora; break;
			case 'ayer': $cuando = $ahora = $dia ; break;
			case 'week': $cuando = $semana; break;
			case 'month': $cuando = $mes; break;
			case 'all': $cuando = $siempre; break;
		}
		$args = array(
			'post_status' => $status,
			'post_type' => $cpt,
			'posts_per_page' => -1,
			'meta_query' => array(
				'relation' => 'AND',
				array( 'key' => $metakey, 'value' => $metavalue, 'compare' => '=', ),
				array( 'key' => $metakey2, 'value' => $metavalue2, 'compare' => '=', ),
				array( 'key' => $metakeyunicos, 'value' => 1, 'compare' => '<=', ),
			),
			'date_query' => array(
				'after'     => $cuando->format("Y-m-d"),
				'before'    => $ahora->format("Y-m-d"),
				'inclusive' => true,
			),
		);
		$my_query = new WP_Query( $args );
		if ( $my_query->have_posts() ):
			$resultados = $my_query->found_posts;
			wp_reset_postdata();
		endif;
		return $resultados;
	}

	/*
	* Entradas, Ubicaciones, Datos, Ratios(Datos/Ubicación, Ubicación/Entradas, Datos/Entradas)
	* $type 'semana'(semana actual), semana_ant'(semana anterior). 'mes'(mes actual), 'mes_ant'(mes anterior)
	* $cpt 'pag_serv_wpfunos','ubicaciones_wpfunos',usuarios_wpfunos'
	* $ratio 'du'(Datos/Ubicación),'ue'(Ubicación/Entradas), 'de'(Datos/Entradas)
	*/
	public function wpfunos_stats_semana_mes( $cpt, $type = 'semana', $ratio = '',$metakey = 'wpfunos_Dummy', $metavalue = true, $unicos = false ){
		$ahora = new DateTime();
		$semana = $ahora->format('W');
		$semana_ant = $semana - 1;
		$mes = $ahora->format('n');
		$mes_ant = $mes - 1;
		$año = $ahora->format('Y');
		if( $mes_ant == 0 ) { $mes_ant = 12; $año--; }
		if( $semana_ant == 0 ) { $semana_ant = 53; $año--; }
		if( $type == 'semana' || $type == 'semana_ant') $data_query_key = 'week';
		if( $type == 'mes' || $type == 'mes_ant') $data_query_key = 'month';
		if( $type == 'semana' )  $data_query_value = $semana;
		if( $type == 'semana_ant' )  $data_query_value = $semana_ant;
		if( $type == 'mes' )  $data_query_value = $mes;
		if( $type == 'mes_ant' )  $data_query_value = $mes_ant;
		if( ! $unicos ){
			$metakeyunicos = 'wpfunos_Dummy';
		}else{
			switch ($cpt){
				case 'usuarios_wpfunos': $metakeyunicos = 'wpfunos_userVisitas'; break;
				case 'ubicaciones_wpfunos': $metakeyunicos = 'wpfunos_ubicacionVisitas'; break;
				case 'pag_serv_wpfunos': $metakeyunicos = 'wpfunos_entradaServiciosVisitas'; break;
			}
		}
		$args = array(
			'post_status' => 'publish',
			'post_type' => $cpt,
			'posts_per_page' => -1,
			'meta_query' => array(
				'relation' => 'AND',
				array( 'key' => $metakey, 'value' => $metavalue, 'compare' => '=', ),
				array( 'key' => $metakeyunicos, 'value' => 1, 'compare' => '<=', ),
			),
			'date_query' => array(
				'year' => $año, //(int) – 4 digit year (e.g. 2011).
				$data_query_key => $data_query_value, //month (int) – Month number (from 1 to 12).   week (int) – Week of the year (from 0 to 53).
			),
		);
		$my_query = new WP_Query( $args );
		$contador = 0;
		if ( $my_query->have_posts() ):
			$contador = $my_query->found_posts;
			wp_reset_postdata();
		endif;
		return $contador;

	}

	/*
	* $type 'day'(same day), 'week'(7 days). 'month'(30 days), 'all'
	* $registro 'cp' 'poblacion'
	* $columna 'numero' 'dato'
	* $this->wpfunos_stats_CP(1,'dato','cp');
	*/
	public function wpfunos_stats_CP( $orden, $columna, $registro,  $type = 'all', $status = 'publish' ){
		$ahora = new DateTime();
		$dia = new DateTime();
		$semana = new DateTime();
		$mes = new DateTime();
		$siempre = new DateTime();
		$dia->sub(new DateInterval('P1D'));
		$semana->sub(new DateInterval('P7D'));
		$mes->sub(new DateInterval('P30D'));
		$siempre->setTimestamp( strtotime("1 March 2022") );
		$cpt = 'ubicaciones_wpfunos';
		$metakey1 = 'wpfunos_ubicacionCP';
		$metakey2 = 'wpfunos_ubicacionDireccion';
		$resultados = 0;
		$CP = [];
		switch ( $type ){
			case 'day': $cuando = $ahora; break;
			case 'week': $cuando = $semana; break;
			case 'month': $cuando = $mes; break;
			case 'all': $cuando = $siempre; break;
		}
		$args = array(
			'post_status' => $status,
			'post_type' => $cpt,
			'posts_per_page' => -1,
			'meta_query' => array(
				array( 'key' => 'wpfunos_ubicacionVisitas', 'value' => 1, 'compare' => '<=', ),
			),
			'date_query' => array(
				array(
					'after'     => $cuando->format("Y-m-d"),
					'before'    => $ahora->format("Y-m-d"),
					'inclusive' => true,
				),
			),
		);
		$my_query = new WP_Query( $args );
		if ( $my_query->have_posts() ):
			while ( $my_query->have_posts() ) :
				$my_query->the_post();
				$CP[] = array( "cp" => get_post_meta( $my_query->post->ID, $metakey1, true ) );
				$poblacion[] = array( "poblacion" => strtolower(get_post_meta( $my_query->post->ID, $metakey2, true ) ) );
			endwhile;
			wp_reset_postdata();
		endif;
		$count=0;
		if( $registro == 'cp' ) $array = array_count_values( array_column($CP, 'cp') );
		if( $registro == 'poblacion' ) $array = array_count_values( array_column($poblacion, 'poblacion') );
		arsort($array, SORT_NUMERIC);
		foreach ( $array as $key=>$numero ) {
			$count++;
			if( $count == $orden ){
				$key = ucwords($key);
				$key = str_replace(" Y "," y ", $key);
				$key = str_replace(" I "," i ", $key);
				$key = str_replace("Del","del", $key);
				if( $key == '' ) $key = 'n/a';
				if( $columna == 'numero') return $numero;
				if( $columna == 'dato')	return substr($key,0,25);
			}
		}
	}

	/*
	* $cpt 'ubicaciones_wpfunos', 'usuarios_wpfunos', 'pag_serv_wpfunos'
	* $type 'day'(same day), 'week'(7 days). 'month'(30 days), 'all'
	* $funcion 'todo' 'media'
	*/
	public function wpfunos_graph_linear( $cpt, $type = 'all', $funcion = 'todo', $status = 'publish' ){
		$ahora = new DateTime();
		$dia = new DateTime();
		$semana = new DateTime();
		$mes = new DateTime();
		$siempre = new DateTime();
		$dia->sub(new DateInterval('P1D'));
		$semana->sub(new DateInterval('P7D'));
		$mes->sub(new DateInterval('P30D'));
		$siempre->sub(new DateInterval('P90D'));
		$array = [];

		switch ($cpt){
			case 'usuarios_wpfunos': $metakeyunicos = 'wpfunos_userVisitas'; break;
			case 'ubicaciones_wpfunos': $metakeyunicos = 'wpfunos_ubicacionVisitas'; break;
			case 'pag_serv_wpfunos': $metakeyunicos = 'wpfunos_entradaServiciosVisitas'; break;
		}
		switch ( $type ){
			case 'day': $cuando = $ahora; break;
			case 'week': $cuando = $semana; break;
			case 'month': $cuando = $mes; break;
			case 'all': $cuando = $siempre; break;
		}
		$suma = 0;
		$dias = 0;
		while( $cuando < $ahora ){
			//$dias++;
			$args = array(
				'post_status' => $status,
				'post_type' => $cpt,
				'posts_per_page' => -1,
				'meta_key' =>  $metakeyunicos,
				'meta_value' => 1,
				'date_query' => array(
					array(
						'year' => $cuando->format("Y"),
						'month' => $cuando->format("m"),
						'day' => $cuando->format("d"),
					),
				),
			);
			$post_list = get_posts( $args );
			$contador = 0;
			if( $post_list ){
				foreach ( $post_list as $post ) :
					$contador++;
					$suma++;
				endforeach;
				wp_reset_postdata();
			}
			if( $suma > 0 ) $dias++;
			if( $funcion == 'todo' && $suma > 0 ) $array[] = array( "label" => $cuando->format('d M'), "y" => $contador, ) ;
			if( $funcion == 'media' && $suma > 0 ) $array[] = array( "label" => $cuando->format('d M'), "y" => $suma/$dias, ) ;
			$cuando->add(new DateInterval( 'P1D' ) );
		}
		return $array;
	}

	/*
	*  $servicio = 'Despedida' = wpfunos_userNombreSeleccionDespedida
	*				'Ataud' = wpfunos_userNombreSeleccionAtaud
	*				'Velatorio' = wpfunos_userNombreSeleccionVelatorio
	*				'Servicio' = wpfunos_userNombreSeleccionServicio
	*/
	public function wpfunos_graph_pie_servicios( $servicio = 'Despedida' ){
		$ahora = new DateTime();
		$array = [];

		switch ( $servicio ){
			case 'Despedida': $metakey = 'wpfunos_userNombreSeleccionDespedida'; $values = array('Sin ceremonia','Solo sala','Ceremonia civil','Ceremonia religiosa'); break;
			case 'Ataud': $metakey = 'wpfunos_userNombreSeleccionAtaud'; $values = array('Ataúd Económico','Ataúd Medio','Ataúd Premium'); break;
			case 'Velatorio': $metakey = 'wpfunos_userNombreSeleccionVelatorio'; $values = array('Velatorio','Sin Velatorio'); break;
			case 'Servicio': $metakey = 'wpfunos_userNombreSeleccionServicio'; $values = array('Incineración','Entierro'); break;
		}
		foreach( $values as $metavalue ){
			$args = array(
				'post_status' => 'publish',
				'post_type' => 'usuarios_wpfunos',
				'posts_per_page' => -1,
				'meta_query' => array(
					'relation' => 'AND',
					array( 'key' => $metakey, 'value' => $metavalue, 'compare' => '=', ),
					array( 'key' => 'wpfunos_userVisitas', 'value' => 1, 'compare' => '<=', ),
				),
				'date_query' => array(
					array(
						'after'     => '2022-03-07',
						'before'    => $ahora->format("Y-m-d"),
						'inclusive' => true,
					),
				),
			);
			$post_list = get_posts( $args );
			$contador = 0;
			if( $post_list ){
				foreach ( $post_list as $post ) :
					$contador++;
				endforeach;
				wp_reset_postdata();
			}
			$array[] = array( "indexLabel" => $metavalue, "y" => $contador, ) ;
		}
		return $array;
	}

	/*
	* $column 'poblacion' 'cp'
	* $todos incluir suma 'Resto'
	*/
	public function wpfunos_graph_pie_CP( $tope = 10, $column = 'poblacion', $todos = false ){
		$ahora = new DateTime();
		$poblacion = [];
		$CP = [];
		$args = array(
			'post_status' => 'publish',
			'post_type' => 'ubicaciones_wpfunos',
			'posts_per_page' => -1,
			'meta_key' =>  'wpfunos_ubicacionVisitas',
			'meta_value' => 1,
			'date_query' => array(
				array(
					'after'     => '2021-03-19',
					'before'    => $ahora->format("Y-m-d"),
					'inclusive' => true,
				),
			),
		);
		$post_list = get_posts( $args );
		if( $post_list ){
			foreach ( $post_list as $post ) :
				if($column == 'poblacion') $array[] = array( "poblacion" => strtolower(get_post_meta( $post->ID, 'wpfunos_ubicacionDireccion', true ) ) );
				if($column == 'cp')$array[] = array( "cp" => get_post_meta( $post->ID, 'wpfunos_ubicacionCP', true ) );
			endforeach;
			wp_reset_postdata();
		}
		if($column == 'poblacion') 	$array = array_count_values( array_column($array, 'poblacion') );
		if($column == 'cp') 		$array = array_count_values( array_column($array, 'cp') );

		arsort($array, SORT_NUMERIC);
		$contador = 0;
		$otros = 0;
		foreach ( $array as $key=>$linea ){
			$contador++;
			if( $contador > $tope ){
				if( $todos ) $otros += $linea;
				continue;
			}
			if($column == 'poblacion'){
				$key = ucwords($key);
				$key = str_replace(" Y "," y ", $key);
				$key = str_replace(" I "," i ", $key);
				$key = str_replace("Del","del", $key);
				$key = substr($key,0,25);
				$resultado[] = array("indexLabel" => $key, "y" => $linea, );
			}
			if($column == 'cp'){
				if( $key == '' ) $key = 'n/a';
				$value = '[' . $key . ']';
				$resultado[] = array("indexLabel" => $value, "y" => $linea, );
			}
		}
		if( $todos ) $resultado[] = array("indexLabel" => "Resto", "y" => $otros, );
		return $resultado;
	}

	/*
	*
	*/
	public function wpfunos_graph_usuarios_ubicaciones( $funcion = 'todo' ){
		$ahora = new DateTime();
		$cuando = new DateTime();
		$cuando->setTimestamp( strtotime("19-3-2022") );

		$suma = 0;
		$dias = 0;
		while( $cuando < $ahora ){
			$dias++;
			$args = array(
				'post_status' => 'publish',
				'post_type' => 'usuarios_wpfunos',
				'posts_per_page' => -1,
				'meta_key' =>  'wpfunos_userVisitas',
				'meta_value' => 1,
				'date_query' => array(
					array(
						'year' => $cuando->format("Y"),
						'month' => $cuando->format("m"),
						'day' => $cuando->format("d"),
					),
				),
			);
			$post_list = get_posts( $args );
			$usuarios = 0;
			if( $post_list ){
				foreach ( $post_list as $post ) :
					$usuarios++;
				endforeach;
				wp_reset_postdata();
			}
			$args = array(
				'post_status' => 'publish',
				'post_type' => 'ubicaciones_wpfunos',
				'posts_per_page' => -1,
				'meta_key' =>  'wpfunos_ubicacionVisitas',
				'meta_value' => 1,
				'date_query' => array(
					array(
						'year' => $cuando->format("Y"),
						'month' => $cuando->format("m"),
						'day' => $cuando->format("d"),
					),
				),
			);
			$post_list = get_posts( $args );
			$ubicaciones = 0;
			if( $post_list ){
				foreach ( $post_list as $post ) :
					$ubicaciones++;
				endforeach;
				wp_reset_postdata();
			}
			$ratio_dia = sprintf ("%.2f",$usuarios/$ubicaciones);
			$suma +=$usuarios/$ubicaciones;
			if( $funcion == 'todo' ) $array[] = array( "label" => $cuando->format('d M'), "y" => $ratio_dia , );
			if( $funcion == 'media' ) $array[] = array( "label" => $cuando->format('d M'), "y" => sprintf ("%.2f",$suma/$dias) , );
			$cuando->add(new DateInterval( 'P1D' ) );
		}
		return $array;
	}

	/*
	*
	*/
	public function wpfunos_graph_ubicaciones_entradas( $funcion = 'todo' ){
		$ahora = new DateTime();
		$cuando = new DateTime();
		$cuando->setTimestamp( strtotime("1-4-2022") );

		$suma = 0;
		$dias = 0;
		while( $cuando < $ahora ){
			$dias++;
			$args = array(
				'post_status' => 'publish',
				'post_type' => 'ubicaciones_wpfunos',
				'posts_per_page' => -1,
				'meta_key' =>  'wpfunos_ubicacionVisitas',
				'meta_value' => 1,
				'date_query' => array(
					array(
						'year' => $cuando->format("Y"),
						'month' => $cuando->format("m"),
						'day' => $cuando->format("d"),
					),
				),
			);
			$post_list = get_posts( $args );
			$ubicaciones = 0;
			if( $post_list ){
				foreach ( $post_list as $post ) :
					$ubicaciones++;
				endforeach;
				wp_reset_postdata();
			}
			$args = array(
				'post_status' => 'publish',
				'post_type' => 'pag_serv_wpfunos',
				'posts_per_page' => -1,
				'meta_key' =>  'wpfunos_entradaServiciosVisitas',
				'meta_value' => 1,
				'date_query' => array(
					array(
						'year' => $cuando->format("Y"),
						'month' => $cuando->format("m"),
						'day' => $cuando->format("d"),
					),
				),
			);
			$post_list = get_posts( $args );
			$entradas = 0;
			if( $post_list ){
				foreach ( $post_list as $post ) :
					$entradas++;
				endforeach;
				wp_reset_postdata();
			}
			$ratio_dia = sprintf ("%.2f",$ubicaciones/$entradas);
			$suma +=$ubicaciones/$entradas;
			if( $funcion == 'todo' ) $array[] = array( "label" => $cuando->format('d M'), "y" => $ratio_dia , );
			if( $funcion == 'media' ) $array[] = array( "label" => $cuando->format('d M'), "y" => sprintf ("%.2f",$suma/$dias) , );
			$cuando->add(new DateInterval( 'P1D' ) );
		}
		return $array;
	}

	/*
	*
	*/
	public function wpfunos_graph_usuarios_entradas( $funcion = 'todo' ){
		$ahora = new DateTime();
		$cuando = new DateTime();
		$cuando->setTimestamp( strtotime("1-4-2022") );

		$suma = 0;
		$dias = 0;
		while( $cuando < $ahora ){
			$dias++;
			$args = array(
				'post_status' => 'publish',
				'post_type' => 'usuarios_wpfunos',
				'posts_per_page' => -1,
				'meta_key' =>  'wpfunos_userVisitas',
				'meta_value' => 1,
				'date_query' => array(
					array(
						'year' => $cuando->format("Y"),
						'month' => $cuando->format("m"),
						'day' => $cuando->format("d"),
					),
				),
			);
			$post_list = get_posts( $args );
			$usuarios = 0;
			if( $post_list ){
				foreach ( $post_list as $post ) :
					$usuarios++;
				endforeach;
				wp_reset_postdata();
			}
			$args = array(
				'post_status' => 'publish',
				'post_type' => 'pag_serv_wpfunos',
				'posts_per_page' => -1,
				'meta_key' =>  'wpfunos_entradaServiciosVisitas',
				'meta_value' => 1,
				'date_query' => array(
					array(
						'year' => $cuando->format("Y"),
						'month' => $cuando->format("m"),
						'day' => $cuando->format("d"),
					),
				),
			);
			$post_list = get_posts( $args );
			$entradas = 0;
			if( $post_list ){
				foreach ( $post_list as $post ) :
					$entradas++;
				endforeach;
				wp_reset_postdata();
			}
			$ratio_dia = sprintf ("%.2f",$usuarios/$entradas);
			$suma +=$usuarios/$entradas;
			if( $funcion == 'todo' ) $array[] = array( "label" => $cuando->format('d M'), "y" => $ratio_dia , );
			if( $funcion == 'media' ) $array[] = array( "label" => $cuando->format('d M'), "y" => sprintf ("%.2f",$suma/$dias) , );
			$cuando->add(new DateInterval( 'P1D' ) );
		}
		return $array;
	}

	/*
	* Incluir el script de los gráficos en el <head>
	*/
	public function my_custom_admin_head() {
		global $pagenow;
		$current_user = wp_get_current_user();
		if ( ! is_user_logged_in() ) return;
		if ( ! current_user_can( 'manage_options' ) ) return;
		if ( ! $current_user->ID == 7 ) return;
		if( ! get_option($this->plugin_name . '_Graph') ) return;
		if ( ( 'admin.php' !== $pagenow ) || ( 'wpfunos' !== $_GET['page'] ) ) return;
		//do_action('wpfunos_log', '==============' );
		//do_action('wpfunos_log', 'my_custom_admin_head $pagenow: ' .$pagenow );
		//do_action('wpfunos_log', 'my_custom_admin_head $_GET[page]: ' .$_GET['page'] );

		$resultado = $this->wpfunos_graph_linear( 'usuarios_wpfunos', 'all' );
		$dataPoints3 = json_encode($resultado, JSON_NUMERIC_CHECK);

		$resultado = $this->wpfunos_graph_linear( 'usuarios_wpfunos', 'all', 'media' );
		$dataPoints5 = json_encode($resultado, JSON_NUMERIC_CHECK);

		$resultado = $this->wpfunos_graph_linear( 'ubicaciones_wpfunos', 'all' );
		$dataPoints8 = json_encode($resultado, JSON_NUMERIC_CHECK);

		$resultado = $this->wpfunos_graph_linear( 'ubicaciones_wpfunos', 'all', 'media' );
		$dataPoints9 = json_encode($resultado, JSON_NUMERIC_CHECK);

		$resultado = $this->wpfunos_graph_linear( 'pag_serv_wpfunos', 'all' );
		$dataPoints20 = json_encode($resultado, JSON_NUMERIC_CHECK);

		$resultado = $this->wpfunos_graph_linear( 'pag_serv_wpfunos', 'all', 'media' );
		$dataPoints21 = json_encode($resultado, JSON_NUMERIC_CHECK);

		$resultado = $this->wpfunos_graph_pie_servicios( 'Despedida' );
		$dataPoints10 = json_encode($resultado, JSON_NUMERIC_CHECK);

		$resultado = $this->wpfunos_graph_pie_servicios( 'Ataud' );
		$dataPoints11 = json_encode($resultado, JSON_NUMERIC_CHECK);

		$resultado = $this->wpfunos_graph_pie_servicios( 'Velatorio' );
		$dataPoints12 = json_encode($resultado, JSON_NUMERIC_CHECK);

		$resultado = $this->wpfunos_graph_pie_servicios( 'Servicio' );
		$dataPoints13 = json_encode($resultado, JSON_NUMERIC_CHECK);

		$resultado = $this->wpfunos_graph_pie_CP( 10, 'poblacion' );
		$dataPoints14 = json_encode($resultado, JSON_NUMERIC_CHECK);

		$resultado = $this->wpfunos_graph_pie_CP( 10, 'poblacion', true );
		$dataPoints15 = json_encode($resultado, JSON_NUMERIC_CHECK);

		$resultado = $this->wpfunos_graph_pie_CP( 10, 'cp' );
		$dataPoints16 = json_encode($resultado, JSON_NUMERIC_CHECK);

		$resultado = $this->wpfunos_graph_pie_CP( 10, 'cp', true );
		$dataPoints17 = json_encode($resultado, JSON_NUMERIC_CHECK);

		$resultado = $this->wpfunos_graph_usuarios_ubicaciones();
		$dataPoints18 = json_encode($resultado, JSON_NUMERIC_CHECK);

		$resultado = $this->wpfunos_graph_usuarios_ubicaciones('media');
		$dataPoints19 = json_encode($resultado, JSON_NUMERIC_CHECK);

		$resultado = $this->wpfunos_graph_ubicaciones_entradas();
		$dataPoints24 = json_encode($resultado, JSON_NUMERIC_CHECK);

		$resultado = $this->wpfunos_graph_ubicaciones_entradas('media');
		$dataPoints25 = json_encode($resultado, JSON_NUMERIC_CHECK);

		$resultado = $this->wpfunos_graph_usuarios_entradas();
		$dataPoints26 = json_encode($resultado, JSON_NUMERIC_CHECK);

		$resultado = $this->wpfunos_graph_usuarios_entradas('media');
		$dataPoints27 = json_encode($resultado, JSON_NUMERIC_CHECK);

		echo '<script type="text/javascript" src="' . WFUNOS_PLUGIN_URL . 'admin/assets/canvasjs.min.js"></script>';
		echo '<script id="wpfunos-head-'.$this->version.'" type="text/javascript">
		window.onload = function () {
			var chart = new CanvasJS.Chart("chartContainer18", {animationEnabled:true,zoomEnabled:true,title:{text: "Entradas",},toolTip: {shared: true,contentFormatter: function (e) {var content = e.entries[0].dataPoint.label + "<br/><span style=\"color:#6D77AC\">Entradas/Día</span><br>";content += e.entries[0].dataSeries.name + " " + "<strong>" + e.entries[0].dataPoint.y + "</strong><br/>";content +=  e.entries[1].dataSeries.name + " " + "<strong>" + e.entries[1].dataPoint.y.toFixed(2) + "</strong><br/>";return content;},},axisY:{scaleBreaks:{autoCalculate:true},title:"Cantidad de entradas"},axisX:{crosshair:{enabled:true,snapToDataPoint:true}},data:[{markerSize:0,type:"splineArea",showInLegend: true,name: "Entradas",dataPoints:'.$dataPoints20.',},{markerSize:0,type: "line",showInLegend: true,name: "Media",dataPoints:'.$dataPoints21.',}]});chart.render();
			var chart = new CanvasJS.Chart("chartContainer5", {animationEnabled:true,zoomEnabled:true,title:{text: "Ubicaciones",},toolTip: {shared: true,contentFormatter: function (e) {var content = e.entries[0].dataPoint.label + "<br/><span style=\"color:#6D77AC\">Ubicaciones/Día</span><br>";content += e.entries[0].dataSeries.name + " " + "<strong>" + e.entries[0].dataPoint.y + "</strong><br/>";content +=  e.entries[1].dataSeries.name + " " + "<strong>" + e.entries[1].dataPoint.y.toFixed(2) + "</strong><br/>";return content;},},axisY:{scaleBreaks:{autoCalculate:true},title:"Cantidad de ubicaciones"},axisX:{crosshair:{enabled:true,snapToDataPoint:true}},data:[{markerSize:0,type:"splineArea",showInLegend: true,name: "Ubicaciones",dataPoints:'.$dataPoints8.'},{markerSize:0,type: "line",showInLegend: true,name: "Media",dataPoints:'.$dataPoints9.',}]});chart.render();
			var chart = new CanvasJS.Chart("chartContainer3", {animationEnabled:true,zoomEnabled:true,title:{text: "Datos",},toolTip: {shared: true,contentFormatter: function (e) {var content = e.entries[0].dataPoint.label + "<br/><span style=\"color:#6D77AC\">Datos/Día</span><br>";content += e.entries[0].dataSeries.name + " " + "<strong>" + e.entries[0].dataPoint.y + "</strong><br/>";content +=  e.entries[1].dataSeries.name + " " + "<strong>" + e.entries[1].dataPoint.y.toFixed(2) + "</strong><br/>";return content;},},axisY:{scaleBreaks:{autoCalculate:true},title:"Cantidad de datos"},axisX:{crosshair:{enabled:true,snapToDataPoint:true}},data:[{markerSize:0,type:"splineArea",showInLegend: true,name: "Datos",dataPoints:'.$dataPoints3.'},{markerSize:0,type: "line",showInLegend: true,name: "Media",dataPoints:'.$dataPoints5.',}]});chart.render();
			var chart = new CanvasJS.Chart("chartContainer6", {animationEnabled:true,zoomEnabled:true,title:{text: "Despedida",},data:[{type: "pie",toolTipContent: "{indexLabel} - {y} - <strong>#percent %</strong>",legendText: "{indexLabel}",dataPoints:'.$dataPoints10.'}]});chart.render();
			var chart = new CanvasJS.Chart("chartContainer7", {animationEnabled:true,zoomEnabled:true,title:{text: "Ataúd",},data:[{type: "pie",toolTipContent: "{indexLabel} - {y} - <strong>#percent %</strong>",legendText: "{indexLabel}",dataPoints:'.$dataPoints11.'}]});chart.render();
			var chart = new CanvasJS.Chart("chartContainer8", {animationEnabled:true,zoomEnabled:true,title:{text: "Velatorio",},data:[{type: "pie",toolTipContent: "{indexLabel} - {y} - <strong>#percent %</strong>",legendText: "{indexLabel}",dataPoints:'.$dataPoints12.'}]});chart.render();
			var chart = new CanvasJS.Chart("chartContainer9", {animationEnabled:true,zoomEnabled:true,title:{text: "Servicio",},data:[{type: "pie",toolTipContent: "{indexLabel} - {y} - <strong>#percent %</strong>",legendText: "{indexLabel}",dataPoints:'.$dataPoints13.'}]});chart.render();
			var chart = new CanvasJS.Chart("chartContainer10", {animationEnabled:true,zoomEnabled:true,title:{text: "Población (Top 10)",},data:[{type: "pie",toolTipContent: "{indexLabel} - {y} - <strong>#percent %</strong>",legendText: "{indexLabel}",dataPoints:'.$dataPoints14.'}]});chart.render();
			var chart = new CanvasJS.Chart("chartContainer11", {animationEnabled:true,zoomEnabled:true,title:{text: "Población (Todos)",},data:[{type: "pie",toolTipContent: "{indexLabel} - {y} - <strong>#percent %</strong>",legendText: "{indexLabel}",dataPoints:'.$dataPoints15.'}]});chart.render();
			var chart = new CanvasJS.Chart("chartContainer12", {animationEnabled:true,zoomEnabled:true,title:{text: "CP (Top 10)",},data:[{type: "pie",toolTipContent: "{indexLabel} - {y} - <strong>#percent %</strong>",legendText: "{indexLabel}",dataPoints:'.$dataPoints16.'}]});chart.render();
			var chart = new CanvasJS.Chart("chartContainer13", {animationEnabled:true,zoomEnabled:true,title:{text: "CP (Todos)",},data:[{type: "pie",toolTipContent: "{indexLabel} - {y} - <strong>#percent %</strong>",legendText: "{indexLabel}",dataPoints:'.$dataPoints17.'}]});chart.render();
			var chart = new CanvasJS.Chart("chartContainer14", {animationEnabled:true,zoomEnabled:true,title:{text: "Datos/Ubicaciones",},toolTip: {shared: true,contentFormatter: function (e) {var content = e.entries[0].dataPoint.label + "<br/><span style=\"color:#6D77AC\">Datos/Ubicaciones</span><br>";content += e.entries[0].dataSeries.name + " " + "<strong>" + e.entries[0].dataPoint.y + "</strong><br/>";content +=  e.entries[1].dataSeries.name + " " + "<strong>" + e.entries[1].dataPoint.y.toFixed(2) + "</strong><br/>";return content;},},axisY:{scaleBreaks:{autoCalculate:true},title:"Ratio de Datos/Ubicaciones"},axisX:{crosshair:{enabled:true,snapToDataPoint:true}},data:[{markerSize:0,type:"splineArea",showInLegend: true,name: "Ratio",dataPoints:'.$dataPoints18.'},{markerSize:0,type: "line",showInLegend: true,name: "Media",dataPoints:'.$dataPoints19.',} ]});chart.render();
			var chart = new CanvasJS.Chart("chartContainer15",{animationEnabled:true,zoomEnabled:true,title:{text: "Datos/Entradas",},toolTip: {shared: true,contentFormatter: function (e) {var content = e.entries[0].dataPoint.label + "<br/><span style=\"color:#6D77AC\">Datos/Entradas</span><br>";content += e.entries[0].dataSeries.name + " " + "<strong>" + e.entries[0].dataPoint.y + "</strong><br/>";content +=  e.entries[1].dataSeries.name + " " + "<strong>" + e.entries[1].dataPoint.y.toFixed(2) + "</strong><br/>";return content;},},axisY:{scaleBreaks:{autoCalculate:true},title:"Ratio de Datos/Entradas"},axisX:{crosshair:{enabled:true,snapToDataPoint:true}},data:[{markerSize:0,type:"splineArea",showInLegend: true,name: "Ratio",dataPoints:'.$dataPoints26.'},{markerSize:0,type: "line",showInLegend: true,name: "Media",dataPoints:'.$dataPoints27.',} ]});chart.render();
			var chart = new CanvasJS.Chart("chartContainer21", {animationEnabled:true,zoomEnabled:true,title:{text: "Ubicaciones/Entradas",},toolTip: {shared: true,contentFormatter: function (e) {var content = e.entries[0].dataPoint.label + "<br/><span style=\"color:#6D77AC\">Ubicaciones/Entradas</span><br>";content += e.entries[0].dataSeries.name + " " + "<strong>" + e.entries[0].dataPoint.y + "</strong><br/>";content +=  e.entries[1].dataSeries.name + " " + "<strong>" + e.entries[1].dataPoint.y.toFixed(2) + "</strong><br/>";return content;},},axisY:{scaleBreaks:{autoCalculate:true},title:"Ratio de Ubicaciones/Entradas"},axisX:{crosshair:{enabled:true,snapToDataPoint:true}},data:[{markerSize:0,type:"splineArea",showInLegend: true,name: "Ratio",dataPoints:'.$dataPoints24.'},{markerSize:0,type: "line",showInLegend: true,name: "Media",dataPoints:'.$dataPoints25.',} ]});chart.render();
		}
		</script>';
	}
}
