<?php
/*
 * Plugin Name:       Quick Cart & Product Variations Table
 * Plugin URI:        https://example.com/plugins/the-basics/
 * Description:       Handle the quick woocommerce product variations in WP.
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Rihan Habib
 * Author URI:        https://author.example.com/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI:        https://example.com/my-plugin/
 * Text Domain:       quickvariable
 * Domain Path:       /languages
 * Requires Plugins:   woocommerce
 */


 function quick_check_pro_loading_allowed(){
    $old_plugin_slug = 'quickvariablepro/Quickvariable.php';

    if ( ! function_exists( 'is_plugin_active' ) ) {
      require_once ABSPATH . '/wp-admin/includes/plugin.php';
    }
  
    if ( is_plugin_active( $old_plugin_slug ) ) {
      /*
       * Prevent issues of WP functions not being available for other plugins that hook into
       * this early deactivation. GH issue #861.
       */
      require_once ABSPATH . WPINC . '/pluggable.php';
  
      if (
        is_multisite() &&
        is_plugin_active_for_network( plugin_basename( __FILE__ ) ) &&
        ! is_plugin_active_for_network( $old_plugin_slug )
      ) {
        // Deactivate Lite plugin if Pro activated on Network level.
        deactivate_plugins( $old_plugin_slug );
      } else {
        // As Pro is loaded and Lite too - deactivate silently itself not to break older SMTP plugin.
        deactivate_plugins( plugin_basename( __FILE__ ) );
  
        if ( is_network_admin() ) {
          add_action( 'network_admin_notices', 'quick_pro_v_deactivation_notice' );
        } else {
          add_action( 'admin_notices', 'quick_pro_v_deactivation_notice' );
        }
  
        return true;
      }
    } // end
  
    return false;
  }
  
  if ( ! function_exists( 'quick_pro_v_deactivation_notice' ) ) {
    /**
     * Display the notice after deactivation.
     *
     * @since 1.5.0
     */
    function quick_pro_v_deactivation_notice() {
  
      echo '<div class="notice notice-warning"><p>' . esc_html__( 'Please deactivate the pro version of the Quick Cart & Product Variations Table.', 'quickvariable' ) . '</p></div>';
  
      if ( isset( $_GET['activate'] ) ) { 
        unset( $_GET['activate'] ); 
      }
    }
  }
  
  // Stop the plugin loading.
  if ( quick_check_pro_loading_allowed() === true ) {
    return;
  }

// Exit if accessed directly
if (!defined("ABSPATH")) {
    exit();
}

// Include Files
$plugin_path = plugin_dir_path(__FILE__);
require_once $plugin_path . "/Inc/Assets.php";
require_once $plugin_path . "/Admin/Admin.php";
require_once $plugin_path . "/Admin/Admin-ajax.php";
require_once $plugin_path . "/Inc/Variable.php";
require_once $plugin_path . "/Inc/Frontend-ajax.php";
require_once $plugin_path . "/Inc/Dynamic-style/Dynamic-css.php";

// Plugin Main
final class Quickvariable
{
    public function __construct()
    {
        $this->init();
    }

    private function init()
    {
        // Load Assets
        new Quickassets();

        // Call Admin
        if (is_admin()) {
            new Qucikadmin();
        }
        //Display variable Frontend
        if (!is_admin()) {
            new Quickvariables();
            new QuickDynamicStyle();
        }
    }
}

$instance = new Quickvariable();
