<?php

require_once( __DIR__ . '/script-installed.php');

class PH_PUSH_Settings_Page {

  private $settings_api;

  function __construct() {
    $page = $_GET['page'];
    $this->settings_api = new WeDevs_Settings_API;
    add_action( 'admin_menu', array($this, 'admin_menu') );
    add_action( 'admin_init', array($this, 'admin_init') );
    if ($page == 'podhero_push') {
      add_action( 'admin_enqueue_scripts', array($this, 'settings_page_style') );
    }
  }

  // Initialize
  function admin_init() {
    $this->settings_api->set_sections( $this->get_settings_sections() );
    $this->settings_api->set_fields( $this->get_settings_fields() );
    $this->settings_api->admin_init();
  }

  // Creates settings page
  function admin_menu() {
    add_options_page( 'PodHero', 'Push Notifications', 'manage_options', 'podhero_push', array($this, 'settings_page') );
  }

  // Gets settings sections
  function get_settings_sections() {
    $sections = array(
      array(
        'id' => 'podhero_push'
      )
    );
    return $sections;
  }

  // Gets settings fields
  function get_settings_fields() {
    $settings_fields = array(
      'podhero_push' => array(
        array(
          'name'       => 'snippet',
          'label'       => __( 'Your Code Snippet', 'podhero_push' ),
          'desc'       => __( 'Put the javascript code from the <a href="https://podhero.io/push_notifications/widget" target="_blank">Get Push Notification Widget</a> page.', 'podhero_push' ),
          'type'       => 'textarea',
          'default'      => ''
        ),
        array(
          'name'  => 'enabled',
          'label'  => __( 'Show the widget:', 'podhero_push' ),
          'desc'  => __( 'Add push notification widget to every page.', 'podhero_push' ),
          'type'  => 'radio',
          'default' => 'yes',
          'options' => array(
            'yes' => 'Yes',
            'no' => 'No'
          )
        )
      )
    );

    return $settings_fields;
  }

  // Settings page
  function settings_page() {
    ?><div class="wrap">
      <h1>PodHero Push Notifications Widget</h1>
      <div class="left">
        <img id="podhero_pushImage" src="<?php echo plugins_url( 'assets/images/PodHero.png', dirname(__FILE__) ) ?>" />
      </div>
      <div class="right">

        <h1 id="explaination">Increase engagement with listeners by sending them browser push notifications!</h1>

        <?php
          $this->settings_api->show_forms();
        ?>

      </div>
    </div>
    <?php
  }
  
  // Settings page style
  function settings_page_style() {
    wp_enqueue_style( 'admin_css', plugins_url( 'assets/styles/settings-page.css', dirname(__FILE__) ), false );
  }
  

}
