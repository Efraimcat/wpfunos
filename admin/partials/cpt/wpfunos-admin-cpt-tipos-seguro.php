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
			'label' => esc_html__('Tipos de seguro', 'wpfunos'),
			'labels'=>
			array(
					'name' => esc_html__('WpFunos Tipos de seguro', 'wpfunos'),
					'singular_name' => esc_html__('Tipo de seguro', 'wpfunos'),
					'add_new' => esc_html__('Añadir tipo de seguro', 'wpfunos'),
					'add_new_item' => esc_html__('Añadir nuevo tipo de seguro', 'wpfunos'),
					'edit_item' => esc_html__('Editar tipo de seguro', 'wpfunos'),
					'new_item' => esc_html__('Nuevo tipo de seguro', 'wpfunos'),
					'view_item' => esc_html__('Ver tipo de seguro', 'wpfunos'),
					'search_items' => esc_html__('Buscar tipo de seguro', 'wpfunos'),
					'not_found' => esc_html__('No se encontraron tipos de seguro', 'wpfunos'),
					'not_found_in_trash' => esc_html__('No se encontraron tipos de seguro en la papelera', 'wpfunos'),
					'menu_name' => esc_html__('Tipos de seguro', 'wpfunos'),
					'name_admin_bar' => esc_html__('Tipos de seguro', 'wpfunos'),
			),
			'public'=>false,
			'description' => esc_html__('Tipos de seguro', 'wpfunos'),
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
		register_post_type( 'tipos_seguro_wpfunos', $customPostTypeArgs );
