<?php

if( !defined( 'ABSPATH' )){
	exit;
}

class ToalberPersonalizzaLogin{

    function __construct(){
        add_filter('login_headerurl', array($this, 'modifica_link_login_wp'));
        add_action('login_enqueue_scripts', array($this, 'incoda_css_login'));
    }

    function modifica_link_login_wp(){
        return esc_url(site_url('/'));
    }

    function incoda_css_login(){

        if(get_option('stringa-da-appendere-al-css-loginizer') == '' || get_option('stringa-da-appendere-al-css-loginizer') == null){
            $stringa_temporale = '0000';
        } else{
            $stringa_temporale = get_option('stringa-da-appendere-al-css-loginizer');
        }

        wp_enqueue_style('stiloso-login-css', WP_PLUGIN_URL . '/toalber-login-customizer/css/stiloso-login-' . $stringa_temporale . '.css');
    }

   
}

$toalberPersonalizzaLogin = new ToalberPersonalizzaLogin();

