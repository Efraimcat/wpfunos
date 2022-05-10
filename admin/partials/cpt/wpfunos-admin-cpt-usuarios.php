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
  'label' => esc_html__('Usuarios registrados', 'wpfunos'),
  'labels'=>
  array(
    'name' => esc_html__('WpFunos Usuarios', 'wpfunos'),
    'singular_name' => esc_html__('Usuario', 'wpfunos'),
    'add_new' => esc_html__('Añadir usuario', 'wpfunos'),
    'add_new_item' => esc_html__('Añadir nuevo usuario', 'wpfunos'),
    'edit_item' => esc_html__('Editar usuario', 'wpfunos'),
    'new_item' => esc_html__('Nuevo usuario', 'wpfunos'),
    'view_item' => esc_html__('Ver usuario', 'wpfunos'),
    'search_items' => esc_html__('Buscar usuario', 'wpfunos'),
    'not_found' => esc_html__('No se encontraron usuarios', 'wpfunos'),
    'not_found_in_trash' => esc_html__('No se encontraron usuarios en la papelera', 'wpfunos'),
    'menu_name' => esc_html__('Usuarios', 'wpfunos'),
    'name_admin_bar' => esc_html__('Usuarios', 'wpfunos'),
  ),
  'public'=>false,
  'description' => esc_html__('Usuarios registrados', 'wpfunos'),
  'exclude_from_search' => true,
  'show_ui' => true,
  'show_in_menu' => $this->plugin_name,
  'supports'=>array('title', 'custom_fields'),
  'capability_type' => 'post',
  'capabilities' => array('create_posts' => false),
  'map_meta_cap' => true,
  'taxonomies'=>array()
);
// Post type, $args - the Post Type string can be MAX 20 characters
register_post_type( 'usuarios_wpfunos', $customPostTypeArgs );
