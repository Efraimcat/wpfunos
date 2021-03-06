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
  'label' => esc_html__('Aseguradoras', 'wpfunos'),
  'labels'=>
  array(
    'name' => esc_html__('WpFunos Aseguradoras', 'wpfunos'),
    'singular_name' => esc_html__('Aseguradora', 'wpfunos'),
    'add_new' => esc_html__('Añadir Aseguradora', 'wpfunos'),
    'add_new_item' => esc_html__('Añadir nueva aseguradora', 'wpfunos'),
    'edit_item' => esc_html__('Editar aseguradora', 'wpfunos'),
    'new_item' => esc_html__('Nuevo aseguradora', 'wpfunos'),
    'view_item' => esc_html__('Ver aseguradora', 'wpfunos'),
    'search_items' => esc_html__('Buscar aseguradora', 'wpfunos'),
    'not_found' => esc_html__('No se encontraron aseguradoras', 'wpfunos'),
    'not_found_in_trash' => esc_html__('No se encontraron aseguradoras en la papelera', 'wpfunos'),
    'menu_name' => esc_html__('Aseguradoras', 'wpfunos'),
    'name_admin_bar' => esc_html__('Aseguradoras', 'wpfunos'),
  ),
  'public'=>false,
  'description' => esc_html__('Aseguradoras', 'wpfunos'),
  'exclude_from_search' => true,
  'show_ui' => true,
  'show_in_menu' => $this->plugin_name,
  'supports'=>array('title', 'custom_fields'),
  'capability_type' => 'post',
  'capabilities' => array('create_posts' => true),
  'map_meta_cap' => true,
  'taxonomies'=>array()
);
// Post type, $args - the Post Type string can be MAX 20 characters
register_post_type( 'aseguradoras_wpfunos', $customPostTypeArgs );
