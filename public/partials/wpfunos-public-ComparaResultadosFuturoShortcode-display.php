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
echo do_shortcode( get_option('wpfunos_seccionComparaPreciosResultadosFuturoCabecera') );
echo do_shortcode( get_option('wpfunos_formGeoMyWpFuturo') );
echo do_shortcode( get_option('wpfunos_seccionComparaPreciosResultadosFuturoPie') );
?>