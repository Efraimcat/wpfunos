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

  public function wpfunosDirectorioWidget(){
    $categorias = explode('/', str_replace( home_url( '/' ),'', $_SERVER['REQUEST_URI'] ));
    //array(5) { [0]=> string(0) "" [1]=> string(10) "directorio" [2]=> string(9) "tanatorio" [3]=> string(8) "zaragoza" [4]=> string(15) "zaragoza-ciudad" }
    if( $categorias[1] == 'directorio' && count( $categorias ) > 2 ){
      $slug_categoria = $categorias[count($categorias)-1];
      $custom_taxonomy = ( $categorias[2] == 'tanatorio') ? 'directorio_poblacion' : 'funeraria_poblacion';
      $term = get_term_by('slug', $slug_categoria , $custom_taxonomy);

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

      echo '<br/>Categoria: ' .$term->name;
      if ( count($categorias) < 4 ){
        $parent_terms = get_terms( $custom_taxonomy, array( 'parent' => 0, 'orderby' => 'slug', 'hide_empty' => false ) );
        echo '<ul>';
        foreach ( $parent_terms as $pterm ) {
          $terms_cat = get_terms( $custom_taxonomy, array( 'parent' => $pterm->term_id, 'orderby' => 'slug', 'hide_empty' => false ) );
          foreach ( $terms_cat as $term_cat ) {
            echo '<li><a href="' . get_term_link( $term_cat ) . '">' . $term_cat->name . '</a></li>';
          }
        }
        echo '</ul>';
      }else{
        $termchildren = get_term_children( $term->term_id, $custom_taxonomy );
        echo '<ul>';
        foreach ( $termchildren as $child ) {
          $term_child = get_term_by( 'id', $child, $custom_taxonomy );
          echo '<li><a href="' . get_term_link( $child, $custom_taxonomy ) . '">' . $term_child->name . '</a></li>';
        }
        echo '</ul>';
      }
    }else{
      if( $categorias[1] == 'directorio_funeraria' || $categorias[1] == 'directorio_entrada' || ( $categorias[1] == 'directorio' && count( $categorias ) < 3 )){
        echo '<ul>';
        echo '<li><a href="'.home_url().'/directorio/tanatorio">Tanatorios</a></li>';
        echo '<li><a href="'.home_url().'/directorio/funeraria">Funerarias</a></li>';
        echo '</ul>';
      }
    }
  }
}
