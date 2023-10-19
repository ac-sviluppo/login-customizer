<?php

if( !defined( 'ABSPATH' )){
	exit;
}

require_once plugin_dir_path(__FILE__) . 'modificaStile.php';
require_once plugin_dir_path(__FILE__) . 'modificaPulsanti.php';
require_once plugin_dir_path(__FILE__) . 'modificaURL.php';

class ToalberPersonalizzaLoginCreaAdminMenuTopLevel{

    function __construct(){
      // QUESTO INVECE AGGIUNGE UN NUOVO TOP LEVEL NEL ADMIN MENU
    add_action('admin_menu', array($this, 'adminTopPage'));

    add_action("admin_enqueue_scripts", array($this, 'incoda_css_tl_menu_page') );

     // INCODA JS PER IMAGE UPLOADER
    //add_action( 'admin_enqueue_scripts',  'media_selector_print_scripts');
    add_action( 'admin_footer',  'media_selector_print_scripts');
    //add_action("load-{$hook_add_submenu_page_0}", 'media_selector_print_scripts' );
    

    }

   function adminTopPage(){
    // AGGIUNGE LA PAGINA TOP LEVEL
    $hook_add_menu_page = add_menu_page('Login Customizer', 'Login Customizer', 'manage_options', 'login-customizer', 'creaTopLevelHTML', 'dashicons-admin-network', 60);
    
    // QUESTA E UNA COPIA DELLA FUNZIONE QUI SOTTO E SERVE PER RINOMINARE LA PRIMA VOCE DEL SOTTOMENU - RINOMINARE TITOLO 
    //COPIANDO I VALORI DELLA PAGINA TOP LEVEL E ANCHE LO SLUG DEVE ESSERE UGUALE ALLA PAGINA TL E ANCHE LA FUNZIONE CB
    $hook_add_submenu_page_0 = add_submenu_page('login-customizer', 'Login Customizer', 'Modifica Stile', 'manage_options', 'login-customizer' , 'creaTopLevelHTML');
    
    // AGGIUNGE SOTTO PAGINA TOP LEVEL
    $hook_add_submenu_page_1 = add_submenu_page('login-customizer', 'Login Customizder Modifica Pulsanti', 'Modifica Pulsanti', 'manage_options', 'modifica-pulsanti' , 'creaSubPageHTML_buttons' );
  
     // AGGIUNGE SOTTO PAGINA TOP LEVEL
     $hook_add_submenu_page_2 = add_submenu_page('login-customizer', 'Login Customizder Modifica URL', 'Modifica URL', 'manage_options', 'modifica-url' , 'creaSubPageHTML_url' );

    // INCODIAMO IL FILE CSS PER QUESTA PAGINA SPECIFICA
    //add_action("load-{$hook_add_submenu_page_0}", 'media_selector_print_scripts' );
    
  }

  function incoda_css_tl_menu_page(){
    wp_enqueue_style('stiloso-impostazioni-css-login-customizer', WP_PLUGIN_URL . '/toalber-login-customizer/css/stiloso-impostazioni.css');

    wp_enqueue_style( 'wp-color-picker' );
    wp_enqueue_script( 'admin-color-picker', WP_PLUGIN_URL . '/toalber-login-customizer/js/colorPicker.js', array( 'wp-color-picker' ), false, true );

  }


}

$toalberPersonalizzaLoginCreaAdminMenuTopLevel = new ToalberPersonalizzaLoginCreaAdminMenuTopLevel();


