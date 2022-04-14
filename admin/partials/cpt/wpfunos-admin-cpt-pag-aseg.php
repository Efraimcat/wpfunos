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
if( apply_filters('wpfunos_userIP','dummy') == '80.26.158.67' ) $show_in_menu = $this->plugin_name;
//$this->plugin_name
$customPostTypeArgs = array(
  'label' => esc_html__('Entradas aseguradoras wpfunos', 'wpfunos'),
  'labels'=>
  array(
    'name' => esc_html__('WpFunos Entrada aseguradoras', 'wpfunos'),
    'singular_name' => esc_html__('Entradas aseguradoras', 'wpfunos'),
    'add_new' => esc_html__('Añadir Entrada aseguradoras', 'wpfunos'),
    'add_new_item' => esc_html__('Añadir nueva Entrada aseguradoras', 'wpfunos'),
    'edit_item' => esc_html__('Editar Entrada aseguradoras', 'wpfunos'),
    'new_item' => esc_html__('Nueva Entrada aseguradoras', 'wpfunos'),
    'view_item' => esc_html__('Ver Entrada aseguradoras', 'wpfunos'),
    'search_items' => esc_html__('Buscar Entrada aseguradoras', 'wpfunos'),
    'not_found' => esc_html__('No se encontraron Entradas aseguradoras', 'wpfunos'),
    'not_found_in_trash' => esc_html__('No se encontraron Entradas aseguradoras en la papelera', 'wpfunos'),
    'menu_name' => esc_html__('Entrada aseguradoras', 'wpfunos'),
    'name_admin_bar' => esc_html__('Entrada aseguradoras', 'wpfunos'),
  ),	
  'public'=>false,
  'description' => esc_html__('Entrada aseguradoras', 'wpfunos'),
  'exclude_from_search' => true,
  'show_ui' => true,
  'show_in_menu' => $show_in_menu,
	'menu_position'=>55,
  'supports'=>array('title', 'custom_fields'),
  'capability_type' => 'post',
  'capabilities' => array('create_posts' => true),
  'map_meta_cap' => true,
  'taxonomies'=>array()
);
// Post type, $args - the Post Type string can be MAX 20 characters
register_post_type( 'pag_aseg_wpfunos', $customPostTypeArgs );
