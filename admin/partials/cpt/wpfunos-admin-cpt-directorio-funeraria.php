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
* @subpackage Wpfunos/admin/partials/cpt
* @author     Efraim Bayarri <efraim@efraim.cat>
*/
//'supports'=>array('title', 'custom_fields', 'editor', 'author', 'thumbnail', 'excerpt'),
$customPostTypeArgs = array(
  'label' => esc_html__('Funeraria Directorio', 'wpfunos'),
  'labels'=>
  array(
    'name' => esc_html__('Funerarias del directorio', 'wpfunos'),
    'singular_name' => esc_html__('Funeraria', 'wpfunos'),
    'add_new' => esc_html__('Añadir funeraria al directorio', 'wpfunos'),
    'add_new_item' => esc_html__('Añadir nueva funeraria al directorio', 'wpfunos'),
    'edit_item' => esc_html__('Editar funeraria del directorio', 'wpfunos'),
    'new_item' => esc_html__('Nueva funeraria del directorio', 'wpfunos'),
    'view_item' => esc_html__('Ver funeraria del directorio', 'wpfunos'),
    'search_items' => esc_html__('Buscar funeraria del directorio', 'wpfunos'),
    'not_found' => esc_html__('No se encontraron funerarias del directorio', 'wpfunos'),
    'not_found_in_trash' => esc_html__('No se encontraron funerarias del directorio en la papelera', 'wpfunos'),
    'menu_name' => esc_html__('Funerarias', 'wpfunos'),
    'name_admin_bar' => esc_html__('Funerarias del directorio', 'wpfunos'),
  ),
  'public'=>true,
  'has_archive' => true,
  'description' => esc_html__('Funerarias del directorio', 'wpfunos'),
  'exclude_from_search' => false,
  'show_ui' => true,
  'show_in_menu' => 'wpfunos_directorio',
  'supports'=>array('title', 'custom_fields', 'author', 'thumbnail', 'excerpt'),
  'capability_type' => 'post',
  'capabilities' => array('create_posts' => true),
  'rewrite' => array( 'with_front'=> false ),
  'capability_type' => 'post',
  'hierarchical' => true,
  'map_meta_cap' => true,
);
// Post type, $args - the Post Type string can be MAX 20 characters
register_post_type( 'directorio_funeraria', $customPostTypeArgs );

register_taxonomy(
  'funeraria_poblacion', array('directorio_funeraria'),array(
    'hierarchical' => true,
    'label' => 'Funerarias directorio',
    'labels'=>
    array(
      'name'              => _x( 'Funeraria directorio', 'taxonomy general name' ),
      'singular_name'     => _x( 'Funeraria directorio', 'taxonomy singular name' ),
      'search_items'      => __( 'Search Categories' ),
      'all_items'         => __( 'All Categories' ),
      'parent_item'       => __( 'Parent Category' ),
      'parent_item_colon' => __( 'Parent Category:' ),
      'edit_item'         => __( 'Edit Category' ),
      'update_item'       => __( 'Update Category' ),
      'add_new_item'      => __( 'Add New Category' ),
      'new_item_name'     => __( 'New Category Name' ),
      'menu_name'         => __( 'Funeraria directorio' ),
    ),
    'singular_label' => 'Funeraria directorio',
    'rewrite' => array(),
    'public'                     => true,
    'show_ui'                    => true,
    'show_admin_column'          => true,
    'show_in_nav_menus'          => true,
    'show_tagcloud'              => true,
  )
);
register_taxonomy_for_object_type( 'funeraria_poblacion', 'directorio_funeraria' );
