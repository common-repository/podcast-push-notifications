<?php

 /**
 * @wordpress-plugin
 * Plugin Name:       Podcast Push Notifications
 * Plugin URI:        https://podhero.io
 * Description:       Reach out to your podcast audience via push notifications!
 * Version:           1.0.0
 * Author:            PodHero.io
 * Author URI:        https://podhero.io
 * License:           GPLv3
 */

require_once( __DIR__ . '/classes/settings-api.php' );
require_once( __DIR__ . '/classes/settings-page.php' );
require_once( __DIR__ . '/classes/inline-script.php' );

new PH_PUSH_Settings_Page();
new PH_PUSH_Inline_Script();
