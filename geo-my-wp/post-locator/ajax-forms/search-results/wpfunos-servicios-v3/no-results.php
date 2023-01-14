<?php
/**
* Posts locator Ajax "default" no results template file.
*
* This file outputs the "No results" template.
*
* This file can be overridden by copying the entire "default" folder with all its files into
*
* your-theme's-or-child-theme's-folder/geo-my-wp/posts-locator/ajax-forms/search-results/
*
* @param $gmw  ( array ) the form being useds
*
*/
?>
<?php if (!isset($_GET['wpfwpf'])) return; ?>

<style>
.wpf-modal {
  display:    none;
  position:   fixed;
  z-index:    1000;
  top:        0;
  left:       0;
  height:     100%;
  width:      100%;
  background: rgba( 0, 0, 0, .8 ) url('https://funos.es/wp-content/uploads/2022/07/Loader.svg') 50% 50% no-repeat;
}

body.wpf-loading .wpf-modal {
  overflow: hidden;
}

body.wpf-loading .wpf-modal {
  display: block;
}

</style>

<div class="gmw-no-results">

  <?php do_action( 'gmw_no_results_start', $gmw ); ?>

  <script type="text/javascript">

  $ = jQuery.noConflict();
  $(document).ready(function(){

    $body = $("body");
    var params = new URLSearchParams(location.search);
    if( params.get('distance') !== '300') {
      $body.addClass("wpf-loading");
      params.set('distance', '300' );
      window.location.search = params.toString();
    }

  });

  </script>

  <?php do_action( 'gmw_no_results_end', $gmw ); ?>

</div>
