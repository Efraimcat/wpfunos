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
  'label' => esc_html__('Tanatorio Directorio', 'wpfunos'),
  'labels'=>
  array(
    'name' => esc_html__('Tanatorios', 'wpfunos'),
    'singular_name' => esc_html__('Tanatorio', 'wpfunos'),
    'add_new' => esc_html__('Añadir tanatorio al directorio', 'wpfunos'),
    'add_new_item' => esc_html__('Añadir nuevo tanatorio al directorio', 'wpfunos'),
    'edit_item' => esc_html__('Editar tanatorio del directorio', 'wpfunos'),
    'new_item' => esc_html__('Nuevo tanatorio del directorio', 'wpfunos'),
    'view_item' => esc_html__('Ver tanatorio del directorio', 'wpfunos'),
    'search_items' => esc_html__('Buscar tanatorio del directorio', 'wpfunos'),
    'not_found' => esc_html__('No se encontraron tanatorios del directorio', 'wpfunos'),
    'not_found_in_trash' => esc_html__('No se encontraron Tanatorios del directorio en la papelera', 'wpfunos'),
    'menu_name' => esc_html__('Tanatorios', 'wpfunos'),
    'name_admin_bar' => esc_html__('Tanatorios del directorio', 'wpfunos'),
  ),
  'public'=>true,
  'has_archive' => true,
  'description' => esc_html__('Tanatorios del directorio', 'wpfunos'),
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
register_post_type( 'directorio_entrada', $customPostTypeArgs );

register_taxonomy(
  'directorio_poblacion', array('directorio_entrada'),array(
    'hierarchical' => true,
    'label' => 'Tanatorios directorio',
    'labels'=>
    array(
      'name'              => _x( 'Tanatorio directorio', 'taxonomy general name' ),
      'singular_name'     => _x( 'Tanatorio directorio', 'taxonomy singular name' ),
      'search_items'      => __( 'Search Categories' ),
      'all_items'         => __( 'All Categories' ),
      'parent_item'       => __( 'Parent Category' ),
      'parent_item_colon' => __( 'Parent Category:' ),
      'edit_item'         => __( 'Edit Category' ),
      'update_item'       => __( 'Update Category' ),
      'add_new_item'      => __( 'Add New Category' ),
      'new_item_name'     => __( 'New Category Name' ),
      'menu_name'         => __( 'Tanatorio directorio' ),
    ),
    'singular_label' => 'Tanatorio directorio',
    'rewrite' => array(),
    'public'                     => true,
    'show_ui'                    => true,
    'show_admin_column'          => true,
    'show_in_nav_menus'          => true,
    'show_tagcloud'              => true,
  )
);
register_taxonomy_for_object_type( 'directorio_poblacion', 'directorio_entrada' );
