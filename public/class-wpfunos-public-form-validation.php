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
* @subpackage Wpfunos/admin
* @author     Efraim Bayarri <efraim@efraim.cat>
*
*wpfunos-visitas-list-table.php
*/

class Wpfunos_Public_Form_Validation extends Wpfunos_Public {

  public function __construct( ) {
    add_action( 'elementor_pro/forms/validation', array( $this, 'wpfunosFormValidation' ), 10, 2 );

  }

  /**
  * Hook Elementor Form Validate entry
  *
  * add_action( 'elementor_pro/forms/validation', array( $this, 'wpfunosFormValidation' ), 10, 2 );
  *
  * #13-Feb-2022 13:26:43: $field:
  * [id] = String: 'nacimiento'
  * [type] = String: 'text'
  * [title] = String: 'Año de nacimiento'
  * [value] = Number: 1957
  * [raw_value] = Number: 1957
  * [required] = TRUE
  *
  * https://dev.to/renzoster/validate-form-fields-in-elementor-54cl
  *
  *  https://developers.elementor.com/forms-api/
  *
  */
  public function wpfunosFormValidation($record, $ajax_handler){
    $form_name = $record->get_form_settings( 'form_name' );
    $userIP = apply_filters('wpfunos_userIP','dummy');
    do_action('wpfunos_log', '==============' );
    do_action('wpfunos_log', $userIP.' - '.'Validación formulario: '. $form_name );

    // Aseguradoras

    if( "FormularioDatosAseguradoras" === $form_name ){
      if( $field = $this->wpfunos_elementor_get_field( 'nacimiento', $record ) ){
        do_action('wpfunos_log', $userIP.' - '.'Validación nacimiento ' .$field['value'] );
        if( (int)$field['value'] < date("Y") - 100 || (int)$field['value'] > date("Y") - 18 ){
          $ajax_handler->add_error( $field['id'], esc_html__('Año de nacimiento inválido. Introduce tu año de nacimiento p.ej: 1990', 'wpfunos_es') );
          do_action('wpfunos_log', $userIP.' - '.'Validación nacimiento: INCORRECTO' );
        }
      }
    }

    //Email aseguradoras
    //email landings
    //Email multistep
    //emailasesor AsesoramientoGratuito
    //email te llamamos gratis
    //
    //https://isitarealemail.com/getting-started/api
    //
    //Nombre
    if( $field = $this->wpfunos_elementor_get_field( 'Nombre', $record ) ){
      do_action('wpfunos_log', $userIP.' - '.'Validación Nombre ' .$field['value'] );
      if( preg_match_all('/[aeiou]/i',$field['value'],$matches) == 0 ){
        $ajax_handler->add_error( $field['id'], esc_html__('Introduce un nombre válido', 'wpfunos_es') );
        do_action('wpfunos_log', $userIP.' - '.'Validación Nombre: INCORRECTO (vocales)' );
      }

      if( strlen( $field['value']) < 4 ){
        $ajax_handler->add_error( $field['id'], esc_html__('Introduce un nombre válido', 'wpfunos_es') );
        do_action('wpfunos_log', $userIP.' - '.'Validación Nombre: INCORRECTO (corto)' );
      }

      if( apply_filters('wpfunos_bloqueo_nombre',$field['value']) ){
        $ajax_handler->add_error( $field['id'], esc_html__('Introduce un nombre válido', 'wpfunos_es') );
        do_action('wpfunos_log', $userIP.' - '.'Validación Nombre: INCORRECTO (inválido)' );
      }

    }

    // EMAIL
    if( $field = $this->wpfunos_elementor_get_field( 'email', $record ) ){
      do_action('wpfunos_log', $userIP.' - '.'Validación email ' .$field['value'] );

      $email  = explode('@', $field['value']);
      $user   = $email[0];
      $domain = $email[1];

      if ( strlen( $user ) < 4 ){
        $ajax_handler->add_error( $field['id'], esc_html__('Introduce una dirección de correo válida', 'wpfunos_es') );
        do_action('wpfunos_log', $userIP.' - '.'Validación email: INCORRECTO (nombre)' );
      }

      if (!filter_var( $field['value'], FILTER_VALIDATE_EMAIL )) {
        $ajax_handler->add_error( $field['id'], esc_html__('Introduce una dirección de correo válida', 'wpfunos_es') );
        do_action('wpfunos_log', $userIP.' - '.'Validación email: INCORRECTO (nombre)' );
      }

      if( count($email) !== 2 || empty($user) || empty($domain) || !checkdnsrr($domain, 'MX') ){
        $ajax_handler->add_error( $field['id'], esc_html__('Introduce una dirección de correo válida', 'wpfunos_es') );
        do_action('wpfunos_log', $userIP.' - '.'Validación email: INCORRECTO (dns)' );
      }

      if ( 'clientes@funos.es' == $field['value']) {
        //  $ajax_handler->add_error( $field['id'], esc_html__('Introduce una dirección de correo válida', 'wpfunos_es') );
        //  do_action('wpfunos_log', $userIP.' - '.'Validación email: INCORRECTO (clientes)' );
      }

      $request_context = stream_context_create( array( 'http' => array( 'header'  => "Authorization: Bearer " . 'c6a7df9e-a854-48a6-a555-79c6fdcdf47d' ) ));
      $result_json = file_get_contents("https://isitarealemail.com/api/email/validate?email=" . $field['value'], false, $request_context);

      if (json_decode($result_json, true)['status'] == "invalid") {
        $ajax_handler->add_error( $field['id'], esc_html__('Introduce una dirección de correo válida', 'wpfunos_es') );
        do_action('wpfunos_log', $userIP.' - '.'Validación email: INCORRECTO (Real Email)' );
      }

      if ( 'arjona400@gmail.com' == $field['value']) {
        $ajax_handler->add_error( $field['id'], esc_html__('Introduce una dirección de correo válida', 'wpfunos_es') );
        do_action('wpfunos_log', $userIP.' - '.'Validación email: INCORRECTO (clientes)' );
      }

      if ( preg_match_all('/[aeiou]/i',$user,$matches) == 0 ){
        $ajax_handler->add_error( $field['id'], esc_html__('Introduce una dirección de correo válida', 'wpfunos_es') );
        do_action('wpfunos_log', $userIP.' - '.'Validación email: INCORRECTO (vocales)' );
      }

    }

    // TELEFONO
    //
    if( $field = $this->wpfunos_elementor_get_field( 'telefono', $record ) ){
      do_action('wpfunos_log', $userIP.' - '.'Validación teléfono ' .$field['value'] );

      $telefono = str_replace(" ","", $field['value'] );
      $telefono = str_replace("-","",$telefono);
      $telefono = str_replace("+34","",$telefono);

      $res = preg_replace("/[^0-9]/", "", $telefono );
      if( strlen($res) < 8 ){
        $ajax_handler->add_error( $field['id'], esc_html__('Introduce un número de teléfono válido', 'wpfunos_es') );
        do_action('wpfunos_log', $userIP.' - '.'Validación teléfono: INCORRECTO (no numérico)' );
      }

      if( apply_filters('wpfunos_bloqueo_tels',$telefono) ){
        $ajax_handler->add_error( $field['id'], esc_html__('Introduce un número de teléfono válido', 'wpfunos_es') );
        do_action('wpfunos_log', $userIP.' - '.'Validación teléfono: INCORRECTO' );
      }

      //if ( 1 !== preg_match( '/^[9|8|6|7][0-9]{8}$/', $telefono ) ) {
      //  $ajax_handler->add_error( $field['id'], esc_html__('Introduce un número de teléfono válido', 'wpfunos_es') );
      //  do_action('wpfunos_log', $userIP.' - '.'Validación teléfono: INCORRECTO' );
      //}

      if( apply_filters('wpfunos_bloqueo_numeros',$telefono) ){
        $ajax_handler->add_error( $field['id'], esc_html__('Introduce un número de teléfono válido', 'wpfunos_es') );
        do_action('wpfunos_log', $userIP.' - '.'Validación teléfono: BLOQUEADO' );
      }
    }
    do_action('wpfunos_log', $userIP.' - '.'Validación formulario: FINAL' );
  }

  public function wpfunos_elementor_get_field( $id, $record ){
    $fields = $record->get_field( [ 'id' => $id, ] );
    if ( empty( $fields ) ) {
      return false;
    }
    return current( $fields );
  }

}
