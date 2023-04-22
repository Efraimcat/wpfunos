<?php
if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly.
}
/**
* The admin-specific functionality of the plugin.
*
* @link       https://github.com/Efraimcat/wpfunos/
* @since      1.0.0
*
* @package    Wpfunos
* @subpackage Wpfunos/admin
* @author     Efraim Bayarri <efraim@efraim.cat>
*
*/
class Wpfunos_Directorio_Widgets extends Wpfunos_Directorio {

  public function __construct( ) {
    add_action( 'wpfunos-directorio-widget', array( $this, 'wpfunosDirectorioWidget' ), 10, 1 );
  }

  /**
  *
  */
  //print_r($categorias);
  //array(5) { [0]=> string(0) "" [1]=> string(10) "directorio" [2]=> string(9) "tanatorio" [3]=> string(8) "zaragoza" [4]=> string(15) "zaragoza-ciudad" }
  //
  //print_r($term);
  //object(WP_Term)#49675 (10) {
  // ["term_id"]=> int(647)
  // ["name"]=> string(15) "Zaragoza ciudad"
  // ["slug"]=> string(15) "zaragoza-ciudad"
  // ["term_group"]=> int(0)
  // ["term_taxonomy_id"]=> int(647)
  // ["taxonomy"]=> string(20) "directorio_poblacion"
  // ["description"]=> string(0) ""
  // ["parent"]=> int(646)
  // ["count"]=> int(2)
  // ["filter"]=> string(3) "raw"
  // }
  //object(WP_Term)#50680 (10) { ["term_id"]=> int(652) ["name"]=> string(16) "Barcelona ciudad" ["slug"]=> string(16) "barcelona-ciudad"
  //["term_group"]=> int(0) ["term_taxonomy_id"]=> int(652) ["taxonomy"]=> string(19) "funeraria_poblacion" ["description"]=> string(0) ""
  //["parent"]=> int(651) ["count"]=> int(1) ["filter"]=> string(3) "raw" }
  //
  // https://dev.funos.es/directorio_funeraria  id="wpfarchive-0" class="wpfarchive-count-2"
  // https://dev.funos.es/marcas                id="wpfarchive-1" class="wpfarchive-count-2"
  // https://dev.funos.es/marcas/memora         id="wpfarchive-2" class="wpfarchive-count-3"
  //
  // =>$termchildren: Array ( [0] => 657 [1] => 658 [2] => 671 )
  //echo '<br/>$namearray ';
  //print_r($namearray);
  //$namearray Array ( [Badalona] => https://dev.funos.es/tanatorios/barcelona/badalona [Barcelona-ciudad] => https://dev.funos.es/tanatorios/barcelona/barcelona-ciudad [Sabadell] => https://dev.funos.es/tanatorios/barcelona/sabadell )

  public function wpfunosDirectorioWidget(){
    $categorias = explode('/', str_replace( home_url( '/' ),'', $_SERVER['REQUEST_URI'] ));
    //print_r($categorias);
    if( $categorias[1] == 'funerarias' || $categorias[1] == 'tanatorios' || $categorias[1] == 'marcas' ){
      $slug_categoria = $categorias[count($categorias)-1];
      //echo '<br/>$slug_categoria: ' .$slug_categoria;
      $custom_taxonomy = ( $categorias[1] == 'tanatorios') ? 'directorio_poblacion' : 'funeraria_poblacion';
      if( $categorias[1] == 'marcas' )$custom_taxonomy = 'directorio_marca';
      //echo '<br/>$custom_taxonomy: ' .$custom_taxonomy;
      $term = get_term_by('slug', $slug_categoria , $custom_taxonomy);
      //print_r($term);
      //echo '<br/>Categoria: ' .$term->name;
      if ( count($categorias) < 3 ) {
        $parent_terms = get_terms( $custom_taxonomy, array( 'parent' => 0, 'orderby' => 'slug', 'hide_empty' => false ) );
        echo '<ul id="wpfarchive-1-2" class="wpfarchive-count-' .count($categorias). '">';
        foreach ( $parent_terms as $pterm ) {
          $terms_cat = get_terms( $custom_taxonomy, array( 'parent' => $pterm->term_id, 'orderby' => 'slug', 'hide_empty' => false ) );
          foreach ( $terms_cat as $term_cat ) {
            echo '<li id="wpflist-1"><a href="' .get_term_link( $term_cat ). '">' .$term_cat->name. '</a></li>';
          }
        }
        echo '</ul>';
      }else{
        $termchildren = get_term_children( $term->term_id, $custom_taxonomy );
        foreach ($termchildren as $child) {
          $term_child = get_term_by( 'id', $child, $custom_taxonomy );
          $namearray[$term_child->name]= get_term_link( $term_child->slug, $custom_taxonomy );
        }
        ksort($namearray);

        //echo '<br/> =>$term_child->slug: <br/>';
        //print_r($term_child->slug);
        //echo '<br/> =>$namearray: <br/>';
        //print_r($namearray);

        echo '<ul id="wpfarchive-2-2" class="wpfarchive-count-' .count($categorias). '">';
        foreach ($namearray as $key => $value) {
          if ( $term->term_id == $term_child->parent ){
            echo '<li id="wpflist-2"><a href="' .$value. '">' .$key. '</a></li>';
          }
        }
        echo '</ul>';

        /**
        * $termchildren = get_term_children( $term->term_id, $custom_taxonomy );
        * echo '<ul id="wpfarchive-3" class="wpfarchive-count-' .count($categorias). '">';
        * foreach ( $termchildren as $child ) {
        *   $term_child = get_term_by( 'id', $child, $custom_taxonomy );
        *
        *   //echo '<br/> =>$term: <br/>';
        *   //print_r($term);
        *   //echo '<br/> =>$term_child: <br/>';
        *   //print_r($term_child);
        *
        *   //echo '<br/> =>term_id: ' .$term->term_id;
        *   //echo '<br/> =>parent: ' .$term_child->parent ;
        *   if ( $term->term_id == $term_child->parent ){
        *     echo '<li><a href="' . get_term_link( $child, $custom_taxonomy ) . '">' . $term_child->name . '</a></li>';
        *
        *   }
        * }
        * echo '</ul>';
        *
        **/

        //=>$namearray:  Array (
        //[Badalona] => WP_Error Object ( [errors] => Array ( [invalid_term] => Array ( [0] => Término vacío. ) ) [error_data] => Array ( ) [additional_data:protected] => Array ( ) )
        //[Barcelona Ciudad] => WP_Error Object ( [errors] => Array ( [invalid_term] => Array ( [0] => Término vacío. ) ) [error_data] => Array ( ) [additional_data:protected] => Array ( ) ) )


      }// FIN if ( count($categorias) < 3 )
    }else{
      if( $categorias[1] == 'directorio_funeraria' || $categorias[1] == 'directorio_entrada' || ( $categorias[1] == 'directorio' && count( $categorias ) < 3 )){
        //echo '<br/>Categorias';
        echo '<ul id="wpfarchive-0" class="wpfarchive-count-' .count($categorias). '">';
        echo '<li><a href="'.home_url().'/funerarias">Funerarias</a></li>';
        echo '<li><a href="'.home_url().'/marcas">Marcas</a></li>';
        echo '<li><a href="'.home_url().'/tanatorios">Tanatorios</a></li>';
        echo '</ul>';
      }
    }// FIN if( $categorias[1] == 'funerarias' || $categorias[1] == 'tanatorios' || $categorias[1] == 'marcas' )
  }


}
