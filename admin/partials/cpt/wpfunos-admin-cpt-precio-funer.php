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
$customPostTypeArgs = array(
  'label' => esc_html__('Precio Población Funerarias', 'wpfunos'),
  'labels'=>
  array(
    'name' => esc_html__('WpFunos Precio Población Funerarias', 'wpfunos'),
    'singular_name' => esc_html__('Precio población funeraria', 'wpfunos'),
    'add_new' => esc_html__('Añadir precio población funeraria', 'wpfunos'),
    'add_new_item' => esc_html__('Añadir nuevo precio población funeraria', 'wpfunos'),
    'edit_item' => esc_html__('Editar precio población funeraria', 'wpfunos'),
    'new_item' => esc_html__('Nuevo precio población funeraria', 'wpfunos'),
    'view_item' => esc_html__('Ver precio población funeraria', 'wpfunos'),
    'search_items' => esc_html__('Buscar precio población funeraria', 'wpfunos'),
    'not_found' => esc_html__('No se encontraron precios población funeraria', 'wpfunos'),
    'not_found_in_trash' => esc_html__('No se encontraron precios población funeraria en la papelera', 'wpfunos'),
    'menu_name' => esc_html__('Precio población funeraria', 'wpfunos'),
    'name_admin_bar' => esc_html__('Precio población funeraria', 'wpfunos'),
  ),
  'public'=>true,
  'has_archive' => true,
  'description' => esc_html__('Precio población funeraria', 'wpfunos'),
  'exclude_from_search' => false,
  'show_ui' => true,
  'show_in_menu' => $this->plugin_name.'precios_poblacion',
  'supports'=>array('title', 'editor', 'author', 'thumbnail'),
  'capability_type' => 'post',
  'capabilities' => array('create_posts' => true),
  'rewrite' => array( 'slug' => '' ),
  'hierarchical' => true,
  'map_meta_cap' => true,
);
// Post type, $args - the Post Type string can be MAX 20 characters
register_post_type( 'precio_funer_wpfunos', $customPostTypeArgs );

register_taxonomy( 'landing_funeraria',
array('precio_funer_wpfunos'),
array(
  'hierarchical' => true,
  'label' => 'Precio funeraria',
  'labels'=>
  array(
    'name'              => _x( 'Landing funeraria', 'taxonomy general name' ),
    'singular_name'     => _x( 'Landing funeraria', 'taxonomy singular name' ),
    'search_items'      => __( 'Search Categories' ),
    'all_items'         => __( 'All Categories' ),
    'parent_item'       => __( 'Parent Category' ),
    'parent_item_colon' => __( 'Parent Category:' ),
    'edit_item'         => __( 'Edit Category' ),
    'update_item'       => __( 'Update Category' ),
    'add_new_item'      => __( 'Add New Category' ),
    'new_item_name'     => __( 'New Category Name' ),
    'menu_name'         => __( 'Landing funeraria' ),
  ),
  'singular_label' => 'Landing funeraria',
  'rewrite' => array(),
  'public'                     => true,
  'show_ui'                    => true,
  'show_admin_column'          => true,
  'show_in_nav_menus'          => true,
  'show_tagcloud'              => true,
)
);
//register_taxonomy_for_object_type( 'landing_funeraria', 'precio_funer_wpfunos' );
