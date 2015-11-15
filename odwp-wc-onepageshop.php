<?php
/**
 * Plugin Name: One Page Shop Plugin
 * Plugin URI: https://github.com/ondrejd/odwp-wc-onepageshop
 * Description: Plugin for WordPress with WooCommerce for creating simple one page shop.
 * Version: 0.1.0
 * Author: Ondřej Doněk
 * Author URI: http://ondrejdonek.blogspot.cz/
 * Requires at least: 4.3
 * Tested up to: 4.3.1
 *
 * Text Domain: odwp-wc-onepageshop
 * Domain Path: /languages/
 *
 * @author Ondřej Doněk, <ondrejd@gmail.com>
 * @link https://github.com/ondrejd/odwp-wc-onepageshop for the canonical source repository
 * @license https://www.mozilla.org/MPL/2.0/ Mozilla Public License 2.0
 * @package odwp-wc-onepageshop
 */


defined('ODWP_WC_ONEPAGESHOP') || define('ODWP_WC_ONEPAGESHOP', 'odwp-wc-onepageshop');
defined('ODWP_WC_ONEPAGESHOP_FILE') || define('ODWP_WC_ONEPAGESHOP_FILE', __FILE__);
defined('ODWP_WC_ONEPAGESHOP_VERSION') || define('ODWP_WC_ONEPAGESHOP_VERSION', '0.1.0');


if (!function_exists('odwpwcops_check_requirements')):

/**
 * Check if requirements are met.
 *
 * @internal
 * @link https://developer.wordpress.org/reference/functions/is_plugin_active_for_network/#source-code
 * @return boolean Returns `true` if requirements are met.
 * @since 0.1.0
 * @todo Current solution doesn't work for WPMU...
 */
function odwpwcops_check_requirements() {
  if (in_array('woocommerce/woocommerce.php', (array) get_option('active_plugins', array()))) {
    return true;
  }

  return false;
} // end odwpwcops_check_requirements()

endif;


if (!function_exists('odwpwcops_deactivate_raw')):

/**
 * Deactivates plugin directly by updating WP option `active_plugins`.
 *
 * @internal
 * @link https://developer.wordpress.org/reference/functions/deactivate_plugins/
 * @return void
 * @since 0.1.0
 * @todo Check if using `deactivate_plugins` whouldn't be better.
 */
function odwpwcops_deactivate_raw() {
  $plugins = get_option('active_plugins');
  $out = array();
  foreach($plugins as $key => $val) {
    if($val != ODWP_WC_ONEPAGESHOP.'/'.ODWP_WC_ONEPAGESHOP.'.php') {
      $out[$key] = $val;
    }
  }
  update_option('active_plugins', $out);
} // end odwpwcops_deactivate_raw()

endif;


if (!function_exists('odwpwcops_minreq_error')):

/**
 * Shows error in WP administration that minimum requirements were not met.
 *
 * @internal
 * @return void
 * @since 0.1.0
 */
function odwpwcops_minreq_error() {
  echo ''.
    '<div id="'.ODWP_WC_ONEPAGESHOP.'_message1" class="error notice is-dismissible">'.
      '<p>'.
        __('The <b>One Page Shop Plugin</b> requires <b>WooCommerce</b> plugin installed and activated.', ODWP_WC_ONEPAGESHOP).
      '</p>'.
    '</div>'.
    '<div id="'.ODWP_WC_ONEPAGESHOP.'_message2" class="updated notice is-dismissible">'.
      '<p>'.
        __('Plugin <b>One Page Shop Plugin</b> was <b>deactivated</b>.', ODWP_WC_ONEPAGESHOP).
      '</p>'.
    '</div>';
} // end odwpwcops_minreq_error()

endif;


if (!function_exists('odwpwcops_activate')):

/**
 * Activates the plugin.
 *
 * @internal
 * @return void
 * @since 0.2.0
 */
function odwpwcops_activate() {
  // ...
  // TODO Add new sample one shop page
  // TODO ADD new templage for one shop page
  // ...
} // end odwpwcops_activate()

endif;


if (!function_exists('odwpwcops_uninstall')):

/**
 * Uninstall the plugin.
 *
 * @internal
 * @return void
 * @since 0.1.1
 */
function odwpwcops_uninstall() {
  if (!defined('WP_UNINSTALL_PLUGIN')) {
    return;
  }

  // ...
} // end odwpwcops_uninstall()

endif;


// Our plug-in is dependant on WooCommerce
if (!odwpwcops_check_requirements()) {
  odwpwcops_deactivate_raw();

  if (is_admin()) {
    add_action('admin_head', 'odwpwcops_minreq_error');
  }

  return;
}

// Everything is OK - initialize the plugin
include_once dirname(__FILE__).'/src/ODWP_WC_OnePageShop.php';

/**
 * @var ODWP_WC_OnePageShop
 */
$ODWP_WC_OnePageShop = new ODWP_WC_OnePageShop();

