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
  'label' => esc_html__('Tanatorio Directorio', 'wpfunos'),
  'labels'=>
  array(
    'name' => esc_html__('WpFunos Tanatorios', 'wpfunos'),
    'singular_name' => esc_html__('Tanatorio', 'wpfunos'),
    'add_new' => esc_html__('Añadir tanatorio al directorio', 'wpfunos'),
    'add_new_item' => esc_html__('Añadir nuevo tanatorio al directorio', 'wpfunos'),
    'edit_item' => esc_html__('Editar tanatorio del directorio', 'wpfunos'),
    'new_item' => esc_html__('Nuevo tanatorio del directorio', 'wpfunos'),
    'view_item' => esc_html__('Ver tanatorio del directorio', 'wpfunos'),
    'search_items' => esc_html__('Buscar tanatorio del directorio', 'wpfunos'),
    'not_found' => esc_html__('No se encontraron tanatorios del directorio', 'wpfunos'),
    'not_found_in_trash' => esc_html__('No se encontraron tanatorios del directorio en la papelera', 'wpfunos'),
    'menu_name' => esc_html__('Tanatorios del directorio', 'wpfunos'),
    'name_admin_bar' => esc_html__('Tanatorios del direcctorio', 'wpfunos'),
  ),
  'public'=>true,
  'has_archive' => true,
  'description' => esc_html__('Tanatorios', 'wpfunos'),
  'exclude_from_search' => false,
  'show_ui' => true,
  'show_in_menu' => $this->plugin_name.'directorio',
  'supports'=>array('title', 'custom_fields', 'editor', 'author', 'thumbnail', 'excerpt'),
  'capability_type' => 'post',
  'capabilities' => array('create_posts' => true),
  'rewrite' => array( 'with_front'=> false ), 'capability_type' => 'post', 
  'hierarchical' => true, 
  'map_meta_cap' => true,
);
// Post type, $args - the Post Type string can be MAX 20 characters
register_post_type( 'tanatorio_d_wpfunos', $customPostTypeArgs );

register_taxonomy( 'poblacion_tanatorio', 
array('tanatorio_d_wpfunos'), 
array(
  'hierarchical' => true, 
  'label' => 'Tanatorio', 
  'labels'=>
  array(
    'name'              => _x( 'Tanatorio', 'taxonomy general name' ),
    'singular_name'     => _x( 'Tanatorio', 'taxonomy singular name' ),
    'search_items'      => __( 'Search Categories' ),
    'all_items'         => __( 'All Categories' ),
    'parent_item'       => __( 'Parent Category' ),
    'parent_item_colon' => __( 'Parent Category:' ),
    'edit_item'         => __( 'Edit Category' ),
    'update_item'       => __( 'Update Category' ),
    'add_new_item'      => __( 'Add New Category' ),
    'new_item_name'     => __( 'New Category Name' ),
    'menu_name'         => __( 'Tanatorio' ),
  ),
  'singular_label' => 'Tanatorio', 
  'rewrite' => array(),
  'public'                     => true,
  'show_ui'                    => true,
  'show_admin_column'          => true,
  'show_in_nav_menus'          => true,
  'show_tagcloud'              => true,
)
);
register_taxonomy_for_object_type( 'poblacion_tanatorio', 'tanatorio_d_wpfunos' );

register_taxonomy( 'poblacion_funeraria', 
array('tanatorio_d_wpfunos'), 
array(
  'hierarchical' => true, 
  'label' => 'Funeraria', 
  'labels'=>
  array(
    'name'              => _x( 'Funeraria', 'taxonomy general name' ),
    'singular_name'     => _x( 'Funeraria', 'taxonomy singular name' ),
    'search_items'      => __( 'Search Categories' ),
    'all_items'         => __( 'All Categories' ),
    'parent_item'       => __( 'Parent Category' ),
    'parent_item_colon' => __( 'Parent Category:' ),
    'edit_item'         => __( 'Edit Category' ),
    'update_item'       => __( 'Update Category' ),
    'add_new_item'      => __( 'Add New Category' ),
    'new_item_name'     => __( 'New Category Name' ),
    'menu_name'         => __( 'Funeraria' ),
  ),
  'singular_label' => 'Funeraria', 
  'rewrite' => array(),
  'public'                     => true,
  'show_ui'                    => true,
  'show_admin_column'          => true,
  'show_in_nav_menus'          => true,
  'show_tagcloud'              => true,
)
);
register_taxonomy_for_object_type( 'poblacion_funeraria', 'tanatorio_d_wpfunos' );

register_taxonomy( 'marca_funeraria', 
array('tanatorio_d_wpfunos'), 
array(
  'hierarchical' => true, 
  'label' => 'Marca funeraria', 
  'labels'=>
  array(
    'name'              => _x( 'Marca', 'taxonomy general name' ),
    'singular_name'     => _x( 'Marca', 'taxonomy singular name' ),
    'search_items'      => __( 'Search Categories' ),
    'all_items'         => __( 'All Categories' ),
    'parent_item'       => __( 'Parent Category' ),
    'parent_item_colon' => __( 'Parent Category:' ),
    'edit_item'         => __( 'Edit Category' ),
    'update_item'       => __( 'Update Category' ),
    'add_new_item'      => __( 'Add New Category' ),
    'new_item_name'     => __( 'New Category Name' ),
    'menu_name'         => __( 'Marca' ),
  ),
  'singular_label' => 'Marca', 
  'rewrite' => array( 'slug' => 'marcas', 'with_front'=> false ),
  'public'                     => true,
  'show_ui'                    => true,
  'show_admin_column'          => true,
  'show_in_nav_menus'          => true,
  'show_tagcloud'              => true,
)
);
register_taxonomy_for_object_type( 'marca_funeraria', 'tanatorio_d_wpfunos' );
