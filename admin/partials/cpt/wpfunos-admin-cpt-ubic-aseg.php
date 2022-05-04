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
$show_in_menu = '';
$current_user = wp_get_current_user();
if ( $current_user->ID == 7 ) $show_in_menu = $this->plugin_name;
$customPostTypeArgs = array(
  'label' => esc_html__('Ubicaciones aseguradoras wpfunos', 'wpfunos'),
  'labels'=>
  array(
    'name' => esc_html__('WpFunos Ubicaciones aseguradoras', 'wpfunos'),
    'singular_name' => esc_html__('Ubicaciones aseguradoras', 'wpfunos'),
    'add_new' => esc_html__('Añadir ubicación aseguradora', 'wpfunos'),
    'add_new_item' => esc_html__('Añadir nueva ubicación aseguradora', 'wpfunos'),
    'edit_item' => esc_html__('Editar ubicación aseguradora', 'wpfunos'),
    'new_item' => esc_html__('Nueva ubicación aseguradora', 'wpfunos'),
    'view_item' => esc_html__('Ver ubicación aseguradora', 'wpfunos'),
    'search_items' => esc_html__('Buscar ubicación aseguradora', 'wpfunos'),
    'not_found' => esc_html__('No se encontraron ubicaciones aseguradoras', 'wpfunos'),
    'not_found_in_trash' => esc_html__('No se encontraron ubicaciones aseguradoras en la papelera', 'wpfunos'),
    'menu_name' => esc_html__('Ubicaciones aseguradoras', 'wpfunos'),
    'name_admin_bar' => esc_html__('Ubicaciones aseguradoras', 'wpfunos'),
  ),
  'public'=>false,
  'description' => esc_html__('Ubicaciones aseguradoras', 'wpfunos'),
  'exclude_from_search' => true,
  'show_ui' => true,
  'show_in_menu' => $show_in_menu,
  'supports'=>array('title', 'custom_fields'),
  'capability_type' => 'post',
  'capabilities' => array('create_posts' => true),
  'map_meta_cap' => true,
  'taxonomies'=>array()
);
// Post type, $args - the Post Type string can be MAX 20 characters
register_post_type( 'ubic_aseg_wpfunos', $customPostTypeArgs );
