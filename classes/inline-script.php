<?php

class PH_PUSH_Inline_Script {

  function __construct() {
    add_action( 'wp_footer', array($this, 'insert_script') );
  }
  
  function insert_script() {
    $snippet = $this->get_option( 'snippet', 'podhero_push' );
    $enabled = $this->get_option( 'enabled', 'podhero_push' );
    if ($enabled == 'yes' && $snippet && $snippet != '') {
      echo $snippet;
    }
  }
  
  function get_option( $option, $section ) {
    $options = get_option( $section );
    if ( isset( $options[$option] ) ) {
      return $options[$option];
    }
    return false;
  }
}
