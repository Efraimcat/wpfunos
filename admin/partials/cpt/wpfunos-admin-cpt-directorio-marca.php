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
  'label' => esc_html__('Marca Directorio', 'wpfunos'),
  'labels'=>
  array(
    'name' => esc_html__('Marcas del directorio', 'wpfunos'),
    'singular_name' => esc_html__('Marca', 'wpfunos'),
    'add_new' => esc_html__('Añadir marca al directorio', 'wpfunos'),
    'add_new_item' => esc_html__('Añadir nueva marca al directorio', 'wpfunos'),
    'edit_item' => esc_html__('Editar marca del directorio', 'wpfunos'),
    'new_item' => esc_html__('Nueva marca del directorio', 'wpfunos'),
    'view_item' => esc_html__('Ver marca del directorio', 'wpfunos'),
    'search_items' => esc_html__('Buscar marca del directorio', 'wpfunos'),
    'not_found' => esc_html__('No se encontraron marcas del directorio', 'wpfunos'),
    'not_found_in_trash' => esc_html__('No se encontraron marcas del directorio en la papelera', 'wpfunos'),
    'menu_name' => esc_html__('Marcas', 'wpfunos'),
    'name_admin_bar' => esc_html__('Marcas del directorio', 'wpfunos'),
  ),
  'public'=>true,
  'has_archive' => true,
  'description' => esc_html__('Marca del directorio', 'wpfunos'),
  'exclude_from_search' => false,
  'show_ui' => true,
  'show_in_menu' => 'wpfunos_directorio',
  'supports'=>array('title', 'custom_fields', 'editor', 'author', 'thumbnail', 'excerpt'),
  'capability_type' => 'post',
  'capabilities' => array('create_posts' => true),
  'rewrite' => array( 'with_front'=> false ), 'capability_type' => 'post',
  'hierarchical' => true,
  'map_meta_cap' => true,
);
// Post type, $args - the Post Type string can be MAX 20 characters
//register_post_type( 'directorio_marcas', $customPostTypeArgs );
