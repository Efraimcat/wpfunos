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
* @subpackage Wpfunos/admin/partials/DB
* @author     Efraim Bayarri <efraim@efraim.cat>
*/
?>
<div class="directorio_marca_wpfunos_containers">
  <ul class="directorio_marca_wpfunos_data_metabox">
    <li class="directorio_marca_wpfunos_list">
      <table>
        <tr>
          <td><?php esc_html_e('Shortcode', 'wpfunos');?></td>
        </tr>
        <tr>
          <td>
            <select name="wpfunos_marcaDirectorioShortcode" id="wpfunos_marcaDirectorioShortcode" style="width: 272px" >
              <?php
              $args = array(
                'post_type' => 'directorio_shortcode',
                'posts_per_page' => -1,
                'post_status' => 'any', // para incluir borradores
                'orderby' => 'title',
                'order' => 'ASC',
              );
              $shortcodes = get_posts( $args );
              foreach( $shortcodes as $shortcode ) {
                ?>
                <option value="<?php echo $shortcode->ID; ?>"
                  <?php if (get_post_meta(  $post->ID , 'wpfunos_marcaDirectorioShortcode', true ) == $shortcode->ID ) echo 'selected="selected"'; ?> ><?php echo get_the_title( $shortcode->ID) ?>
                </option>
                <?php
              }
              ?>
            </select>
          </td>
        </tr>
      </table>
    </li>
    <hr/>
  </ul>
</div>
