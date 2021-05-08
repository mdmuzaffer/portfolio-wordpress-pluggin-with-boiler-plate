<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://github.com/mdmuzaffer
 * @since             1.0.0
 * @package           Portfolio
 *
 * @wordpress-plugin
 * Plugin Name:       portfolio
 * Plugin URI:        portfolio
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Muzaffer
 * Author URI:        http://github.com/mdmuzaffer
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       portfolio
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'PORTFOLIO_VERSION', '1.0.0' );
define( 'PORTFOLIO_PLUGIN_URL', plugin_dir_url( __FILE__ ));
define( 'PORTFOLIO_PLUGIN_PATH', plugin_dir_path( __FILE__ ));

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-portfolio-activator.php
 */
function activate_portfolio() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-portfolio-activator.php';

	//Portfolio_Activator::activate();

	$activater = new Portfolio_Activator();
	$activater->activate();

	
	
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-portfolio-deactivator.php
 */
function deactivate_portfolio() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-portfolio-deactivator.php';
	//Portfolio_Deactivator::deactivate();

	$deactivater = new Portfolio_Deactivator();
	$deactivater->deactivate();

}

register_activation_hook( __FILE__, 'activate_portfolio' );
register_deactivation_hook( __FILE__, 'deactivate_portfolio' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-portfolio.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_portfolio() {

	$plugin = new Portfolio();
	$plugin->run();

}
run_portfolio();


