<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
/**
 * @link       https://efraim.cat
 * @since      1.0.0
 *
 * @package    WpFunos
 * @subpackage WpFunos/public/partials
 */
?>
<section class="elementor-section elementor-inner-section elementor-element elementor-element-8f7e7d5 elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="8f7e7d5" data-element_type="section">
  <div class="elementor-container elementor-column-gap-default">
    <div class="elementor-row">
      <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-d218a25" data-id="d218a25" data-element_type="column">
        <div class="elementor-column-wrap elementor-element-populated">
          <div class="elementor-widget-wrap">
            <div class="elementor-element elementor-element-cfdfb78 elementor-align-center elementor-widget elementor-widget-button" data-id="cfdfb78" data-element_type="widget" data-widget_type="button.default">
              <div class="elementor-widget-container">
                <?php echo do_shortcode( get_option('wpfunos_seccionComparaPreciosDatosFuturo') ); ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>