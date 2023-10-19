<?php
/**
* Plugin Name: Login Customizer & Open Registration
* Plugin URI:  https://ac-sviluppo.it/
* Description: This plugin lets you customize the login page, the login form, enables open registration for subscribers and create buttons for subscriber login / logout. 
* Version:     1.0.14
* Author:      Alberto Carenini (Toalber)
* License:     GPL-2.0+
* Author URI:  https://ac-sviluppo.it/
* Copyright:   2023 AC Sviluppo
* Text Domain: toalber_login_customizer
* Domain Path: /languages
*/

if( !defined( 'ABSPATH' )){
	exit;
}

/// REQUIRE FILE PER REGISTRAZIONE MENU ADMIN
require_once plugin_dir_path(__FILE__) . '/inc/creaAdminMenuTopLevel.php';

// REQUIRE FILE PER AZIONI SU FRONTEND
require_once plugin_dir_path(__FILE__) . '/inc/personalizzaLogin.php';

// REQUIRE FILE PER BLOCCO GUTENBERG
require_once plugin_dir_path(__FILE__) . '/inc/gutenberg.php';

// REQUIRE FILE PER CREARE CPT
require_once plugin_dir_path(__FILE__) . '/inc/creaCPT.php';

// REQUIRE FILE PER RENDER HTML
require_once plugin_dir_path(__FILE__) . '/inc/creaGutenbergFrontEnd.php';

// REQUIRE FILE PER API ENDPOINT
require_once plugin_dir_path(__FILE__) . '/inc/apiEndPoint.php';

// INCLUDI PROVA PHP
//require_once plugin_dir_path(__FILE__) . '/inc/prova.php';

class InizializzaPluginToalberLoginCustomizer{

	function __construct(){

	}

	

}

$inizializzaPluginToalberLoginCustomizer = new InizializzaPluginToalberLoginCustomizer();
