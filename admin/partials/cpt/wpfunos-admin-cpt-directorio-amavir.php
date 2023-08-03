<?php
if (!defined('ABSPATH')) {
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
  'label' => esc_html__('Directorio Amavir', 'wpfunos'),
  'labels' =>
  array(
    'name' => esc_html__('Directorio Amavir', 'wpfunos'),
    'singular_name' => esc_html__('Directorio Amavir', 'wpfunos'),
    'add_new' => esc_html__('Añadir entrada al directorio Amavir', 'wpfunos'),
    'add_new_item' => esc_html__('Añadir nueva entrada al directorio Amavir', 'wpfunos'),
    'edit_item' => esc_html__('Editar entrada del directorio Amavir', 'wpfunos'),
    'new_item' => esc_html__('Nueva entrada al directorio Amavir', 'wpfunos'),
    'view_item' => esc_html__('Ver entrada del directorio Amavir', 'wpfunos'),
    'search_items' => esc_html__('Buscar entrada del directorio Amavir', 'wpfunos'),
    'not_found' => esc_html__('No se encontraron entradas del directorio Amavir', 'wpfunos'),
    'not_found_in_trash' => esc_html__('No se encontraron entradaa del directorio Amavir en la papelera', 'wpfunos'),
    'menu_name' => esc_html__('Directorio Amavir', 'wpfunos'),
    'name_admin_bar' => esc_html__('Directorio Amavir', 'wpfunos'),
  ),
  'public' => true,
  'has_archive' => true,
  'description' => esc_html__('Directorio Amavir', 'wpfunos'),
  'exclude_from_search' => false,
  'show_ui' => true,
  'show_in_menu' => 'wpfunos_prescriptores',
  'supports' => array('title', 'custom_fields', 'author', 'thumbnail', 'excerpt'),
  'capability_type' => 'post',
  'capabilities' => array('create_posts' => true),
  'rewrite' => array('with_front' => false), 'capability_type' => 'post',
  'hierarchical' => true,
  'map_meta_cap' => true,
);
// Post type, $args - the Post Type string can be MAX 20 characters
register_post_type('directorio_amavir', $customPostTypeArgs);

register_taxonomy(
  'directorio_amavir_poblacion',
  array('directorio_amavir'),
  array(
    'hierarchical' => true,
    'label' => 'Tanatorios directorio Amavir',
    'labels' =>
    array(
      'name'              => _x('Tanatorio directorio Amavir', 'taxonomy general name'),
      'singular_name'     => _x('Tanatorio directorio Amavir', 'taxonomy singular name'),
      'search_items'      => __('Search Categories'),
      'all_items'         => __('All Categories'),
      'parent_item'       => __('Parent Category'),
      'parent_item_colon' => __('Parent Category:'),
      'edit_item'         => __('Edit Category'),
      'update_item'       => __('Update Category'),
      'add_new_item'      => __('Add New Category'),
      'new_item_name'     => __('New Category Name'),
      'menu_name'         => __('Tanatorio directorio Amavir'),
    ),
    'singular_label' => 'Tanatorio directorio Amavir',
    'rewrite' => array(),
    'public'                     => true,
    'show_ui'                    => true,
    'show_admin_column'          => true,
    'show_in_nav_menus'          => true,
    'show_tagcloud'              => true,
    'capabilities'      => array(
      'manage_terms'  => 'funos_directorio',
      'edit_terms'    => 'funos_directorio',
      'delete_terms'  => 'funos_directorio',
      'assign_terms'  => 'funos_directorio'
    )
  )
);
register_taxonomy_for_object_type('directorio_amavir_poblacion', 'directorio_amavir');
