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
  'label' => esc_html__('Provincias precio medio', 'wpfunos'),
  'labels'=>
  array(
    'name' => esc_html__('WpFunos Provincias precio medio', 'wpfunos'),
    'singular_name' => esc_html__('Provincias', 'wpfunos'),
    'add_new' => esc_html__('Añadir Provincia', 'wpfunos'),
    'add_new_item' => esc_html__('Añadir nueva Provincia', 'wpfunos'),
    'edit_item' => esc_html__('Editar Provincia', 'wpfunos'),
    'new_item' => esc_html__('Nueva Provincia', 'wpfunos'),
    'view_item' => esc_html__('Ver Provincia', 'wpfunos'),
    'search_items' => esc_html__('Buscar Provincia', 'wpfunos'),
    'not_found' => esc_html__('No se encontraron Provincias', 'wpfunos'),
    'not_found_in_trash' => esc_html__('No se encontraron Provincias en la papelera', 'wpfunos'),
    'menu_name' => esc_html__('Precio Medio Zona', 'wpfunos'),
    'name_admin_bar' => esc_html__('Precio Medio Zona', 'wpfunos'),
  ),
  'public'=>false,
  'description' => esc_html__('Provincias precio medio', 'wpfunos'),
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
register_post_type( 'prov_zona_wpfunos', $customPostTypeArgs );
