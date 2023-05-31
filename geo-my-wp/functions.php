<?php
/*
* This is the child theme for Astra theme, generated with Generate Child Theme plugin by catchthemes.
*
* (Please see https://developer.wordpress.org/themes/advanced-topics/child-themes/#how-to-create-a-child-theme)
*/
add_action( 'wp_enqueue_scripts', 'astra_funos_enqueue_styles' );
function astra_funos_enqueue_styles() {
  wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
  wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css',array('parent-style'));
}
/*
* Your code goes below
*/

function gmw_custom_get_zipcode_on_form_submission() {
  ?>
  <script type="text/javascript">

  jQuery( document ).ready( function() {

    if ( typeof GMW != 'undefined' ) {

      // Executes when address is geocoded during form submission.
      GMW.add_filter( 'gmw_geocoder_result_on_success', function( results ) {

        // Check if zipcode exists.
        if ( results.postcode != '' ) {
          document.getElementById("CP").value = results.postcode;
        }

        return results;
      });

      // Executes when selecting an address from the address autocomplete suggested results.
      GMW.add_action( 'gmw_address_autocomplete_place_changed', function( place, autocomplete, field_id, input_field, options ) {

        // Get the location fields from the selected option.
        var results = GMW_Geocoders.google_maps.getLocationFields( place );

        // If zipcode exists.
        if ( results.postcode != '' ) {
          document.getElementById("CP").value = results.postcode;
        }
      });
    }
  });
  </script>
  <?php
}
add_action( 'wp_footer', 'gmw_custom_get_zipcode_on_form_submission', 50 );

function add_meta_for_search_excluded()
{
  global $post;
  if (false !== array_search($post->ID, get_option('sep_exclude', array()))) {
    echo '<meta name="robots" content="noindex,nofollow" />', "\n";
  }
}
add_action('wp_head', 'add_meta_for_search_excluded');

function set_funos_cookie() {
  $expiry = strtotime('+1 year');
  global $current_user;
  get_currentuserinfo();

  // Añadir cookie si esta conectado.

  if ( is_user_logged_in() ) {
    setcookie('wpfunosloggedin', 'yes',  ['expires' => 0, 'path' => COOKIEPATH, 'domain' => COOKIE_DOMAIN, 'secure' => true, 'httponly' => true, 'samesite' => 'Lax',] );
  }

  $email = ( isset( $_COOKIE['wpfunosloggedin'] ) ) ? $current_user->user_email : '' ;
  $name = ( isset( $_COOKIE['wpfunosloggedin'] ) ) ? $current_user->display_name : '' ;
  $phone = ( isset( $_COOKIE['wpfunosloggedin'] ) ) ? str_replace(" ","",get_user_meta( $current_user->ID, 'wpfunos_telefono' , true )) : '' ;

  if( !isset( $_COOKIE['wpfu'] ) ){
    $colab = ( current_user_can( 'funos_colaborador' ) ) ? 'yes' : 'no' ;
    $wpfu = array(
      'name' => $email,
      'email' => $name,
      'phone' => $phone,
      'colab' => $colab,
      'lastserv' => '',
      'lasttimeserv' => '',
    );
    $codigo = apply_filters( 'wpfunos_crypt', json_encode($wpfu), 'e' );
    setcookie('wpfu', $codigo,  ['expires' => $expiry, 'path' => COOKIEPATH, 'domain' => COOKIE_DOMAIN, 'secure' => true, 'httponly' => true, 'samesite' => 'Lax',] );
  }else{
    setcookie('wpfu', $_COOKIE['wpfu'],  ['expires' => $expiry, 'path' => COOKIEPATH, 'domain' => COOKIE_DOMAIN, 'secure' => true, 'httponly' => true, 'samesite' => 'Lax',] );
  }
}
add_action( 'init', 'set_funos_cookie' );

function cargar_plantillas_globales() {
  ElementorPro\Modules\Popup\Module::add_popup_to_location( '143773' ); //Servicios cambiar distancia V3
  ElementorPro\Modules\Popup\Module::add_popup_to_location( '144166' ); //confirmación OK
}
add_action( 'init', 'cargar_plantillas_globales' );

function set_funos_referer() {
  //utm_campaign
  //
  // Recommended
  // $str = "first=value&arr[]=foo+bar&arr[]=baz";
  //  parse_str($str, $output);
  //  echo $output['first'];  // value
  //  echo $output['arr'][0]; // foo bar
  //  echo $output['arr'][1]; // baz
  //
  $userIP = apply_filters('wpfunos_userIP','dummy');
  $query = sanitize_text_field( $_SERVER['QUERY_STRING'] );
  if( strpos( $query, 'utm_campaign' ) ){
    parse_str($query,$output);
    set_transient( 'wpfunos-query-' .$userIP, $output, HOUR_IN_SECONDS );
  }

  $referer = sanitize_text_field( $_SERVER['HTTP_REFERER'] );
  if( $referer != '' && !strpos($referer, '/funos.es') && !strpos($referer, '/FUNOS.ES') ){
    set_transient( 'wpfunos-referer-' .$userIP, $referer, HOUR_IN_SECONDS );
  }

  $wpfutk = ( isset( $_COOKIE['hubspotutk'] ) ) ? $_COOKIE['hubspotutk'] : '' ;
  if( $wpfutk != '' ){
    $utk['wpfutk'] = $wpfutk;
    $utk['wpfads'] = $_COOKIE['cookielawinfo-checkbox-advertisement'];
    $utk['wpfana'] = $_COOKIE['cookielawinfo-checkbox-analytics'];
    $utk['wpffun'] = $_COOKIE['cookielawinfo-checkbox-functional'];
    $utk['wpfnec'] = $_COOKIE['cookielawinfo-checkbox-necessary'];
    $utk['wpfnon'] = $_COOKIE['cookielawinfo-checkbox-non-necessary'];
    $utk['wpfoth'] = $_COOKIE['cookielawinfo-checkbox-others'];
    $utk['wpfper'] = $_COOKIE['cookielawinfo-checkbox-performance'];
    if( !get_transient('wpfunos-utk-' .$userIP ) ){
      set_transient( 'wpfunos-utk-' .$userIP, $utk, HOUR_IN_SECONDS );
    }
  }

}
add_action( 'init', 'set_funos_referer' );

function wpf_admin_notice_warn() {
  global $pagenow;
  $user = wp_get_current_user();
  if( site_url() === 'https://dev.funos.es'){
    echo '<div class="notice notice-warning is-dismissible">
    <p><strong>IMPORTANTE</strong>: <u>Entorno de desarrollo de funos.es</u></p>
    <p><strong>IMPORTANTE</strong>: El entorno de DESARROLLO se reinicia cada semana. Todos los datos se reinician con los valores de funos.es. Manten siempre una copia actualizada y documentada de todo tu trabajo.</p>
    </div>';
    if ( $pagenow == 'edit.php' && isset( $_GET['post_type'] ) && $_GET['post_type'] ==  'custom-css-js') {
      echo '<div class="notice notice-warning is-dismissible">
      <p>funos.es: <a href="https://docs.google.com/document/d/1oBmkyGh-2G3qywJNFI-Q1_iGJ6TEO7jvBylJ-muPjw4/edit?usp=sharing" target="_blank">Documentación de ayuda para Custom CSS & JS</a>.</p>
      </div>';
    }
  }
}
add_action( 'admin_notices', 'wpf_admin_notice_warn' );

function disabling_emails( $args ){
  if( site_url() === 'https://dev.funos.es'){
    unset ( $args['to'] );
    unset ( $args['headers'] );
  }
  return $args;
}
add_filter('wp_mail','disabling_emails', 10,1);

// Habilitar la subida de imágenes en formato SVG en WordPress
add_filter( 'upload_mimes', 'jc_custom_upload_mimes' );
function jc_custom_upload_mimes( $existing_mimes = array() ) {
  $existing_mimes['svg'] = 'image/svg+xml';
  return $existing_mimes;
}

// is logged in
//
function ajax_check_user_logged_in() {
  echo is_user_logged_in()?'yes':'no';
  die();
}
add_action('wp_ajax_is_user_logged_in', 'ajax_check_user_logged_in');
add_action('wp_ajax_nopriv_is_user_logged_in', 'ajax_check_user_logged_in');


/**
* WordPress function for redirecting users on login based on user role
*/
function wpfunos_login_redirect( $url, $request, $user ) {
  if ( $user && is_object( $user ) && is_a( $user, 'WP_User' ) ) {
    if ( in_array( 'contributor', (array) $user->roles ) || in_array( 'Colaborador', (array) $user->roles ) ) {
      $url = home_url( '/' );
    } else {
      $url = admin_url();
    }
  }
  return $url;
}
add_filter( 'login_redirect', 'wpfunos_login_redirect', 10, 3 );


add_filter( 'wp_mail_from', 'my_mail_from' );
function my_mail_from( $email ) {
	return "clientes@funos.es";
}

/*
* WOOCOMMERCE
*/
include("wpfunoscommerce.php");
/*
*
*/
/*
* WIDGET DIRECTORIO
*/
include("wpfunoswidgetdirectorio.php");
/*
*
*/
