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
  'label' => esc_html__('Entrada Directorio', 'wpfunos'),
  'labels'=>
  array(
    'name' => esc_html__('Entradas del directorio', 'wpfunos'),
    'singular_name' => esc_html__('Entrada', 'wpfunos'),
    'add_new' => esc_html__('Añadir entrada al directorio', 'wpfunos'),
    'add_new_item' => esc_html__('Añadir nueva entrada al directorio', 'wpfunos'),
    'edit_item' => esc_html__('Editar entrada del directorio', 'wpfunos'),
    'new_item' => esc_html__('Nueva entrada del directorio', 'wpfunos'),
    'view_item' => esc_html__('Ver entrada del directorio', 'wpfunos'),
    'search_items' => esc_html__('Buscar entrada del directorio', 'wpfunos'),
    'not_found' => esc_html__('No se encontraron entradas del directorio', 'wpfunos'),
    'not_found_in_trash' => esc_html__('No se encontraron entradas del directorio en la papelera', 'wpfunos'),
    'menu_name' => esc_html__('Entradas', 'wpfunos'),
    'name_admin_bar' => esc_html__('Entradas del directorio', 'wpfunos'),
  ),
  'public'=>true,
  'has_archive' => true,
  'description' => esc_html__('Entradas del directorio', 'wpfunos'),
  'exclude_from_search' => false,
  'show_ui' => true,
  'show_in_menu' => 'wpfunos_directorio',
  'supports'=>array('title', 'custom_fields', 'author', 'thumbnail', 'excerpt'),
  'capability_type' => 'post',
  'capabilities' => array('create_posts' => true),
  'rewrite' => array( 'with_front'=> false ), 'capability_type' => 'post',
  'hierarchical' => true,
  'map_meta_cap' => true,
);
// Post type, $args - the Post Type string can be MAX 20 characters
register_post_type( 'directorio_entrada', $customPostTypeArgs );
