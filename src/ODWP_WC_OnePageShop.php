<?php
/**
 * One Page Shop Plugin
 *
 * @author Ondřej Doněk, <ondrejd@gmail.com>
 * @link https://github.com/ondrejd/odwp-wc-onepageshop for the canonical source repository
 * @license https://www.mozilla.org/MPL/2.0/ Mozilla Public License 2.0
 * @package odwp-wc-onepageshop
 */

if (!class_exists('ODWP_WC_OnePageShop')):

/**
 * Main class of the plug-in.
 *
 * @since 0.1.0
 */
class ODWP_WC_OnePageShop {
  const ID = ODWP_WC_ONEPAGESHOP;
  const VERSION = ODWP_WC_ONEPAGESHOP_VERSION;

  /**
   * Constructor.
   *
   * @return void
   * @since 0.1.0
   * @uses add_action()
   * @uses register_activation_hook()
   * @uses register_uninstall_hook()
   */
  public function __construct() {
    register_activation_hook(ODWP_WC_ONEPAGESHOP_FILE, 'odwpwcops_activate');
    register_uninstall_hook(ODWP_WC_ONEPAGESHOP_FILE, 'odwpwcops_uninstall');

    add_action('init', array($this, 'load_plugin_textdomain'));
    add_action('plugins_loaded', array($this, 'init'));
  } // end __construct()

  /**
   * Initialize localization.
   *
   * @return void
   * @since 0.2.0
   * @uses load_plugin_textdomain()
   */
  public function load_plugin_textdomain() {
    $path = ODWP_WC_ONEPAGESHOP.'/languages';
    load_plugin_textdomain(ODWP_WC_ONEPAGESHOP, false, $path);
  } // end load_plugin_textdomain()

  /**
   * Initialize plug-in.
   *
   * @return void
   * @since 0.1.0
   * @uses add_action()
   * @uses add_filter()
   * @uses is_admin()
   */
  public function init() {
    // ...
  } // end init()
} // End of ODWP_WC_OnePageShop

endif;
