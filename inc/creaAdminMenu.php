<?php

if( !defined( 'ABSPATH' )){
	exit;
}

class ToalberPersonalizzaLoginCreaAdminMenu{

    function __construct(){
        // QUESTO AGGIUNGE LA FUNZIONE CHE AGGIUNGE MENU SOTTO SETTINGS
    add_action('admin_menu', array($this, 'adminPage'));

    // QUESTO AGGIUNGE FUNZIONE PER REGISTRARE LE IMPOSTAZIONI NELLE VARIE PAGINE
   add_action('admin_init', array($this, 'settings'));

   add_action('admin_enqueue_scripts', array($this, 'incoda_css_login'));
    }

    function adminPage() {
        // AGGIUNGE UNA VOCE SOTTO "IMPOSTAZIONI"
        add_options_page('Login Customizer Impostazioni', 'Log-in Customizer', 'manage_options', 'login-customizer', array($this, 'scriviHTML'));
      }

      function settings(){
        // AGGIUNGE UNA SEZIONE DEI SETTINGS RIGUARDA LA SEZIONE NON IL PRIMO CAMPO
        add_settings_section('sezione_modifica_css', 'Modifica lo Stile', array($this, 'descrizione_sezione_nullable'), 'pagina-impostazioni');

// SECONDO CAMPO --- QUESTO E UN TEXT INPUT
        // AGGIUNGI CAMPI DI OPZIONE RIGUARDA IL SECONDO CAMPO
        add_settings_field('text_area_paste_custom_css', 'Incolla il tuo CSS', array($this, 'funzioneCreaHTMLdelPrimoCampo2'), 'pagina-impostazioni', 'sezione_modifica_css'  );

        // REGISTRA LE IMPOSTAZIONI  RIGUARDA IL SECONDO CAMPO
        register_setting('gruppo_di_appartenenza', 'text_area_paste_custom_css', array(
                    'sanitize_callback' => 'sanitize_text_field',
                    'default' => 'Incolla qui il tuo CSS personalizzato!'
        ));

  }

  function descrizione_sezione_nullable(){
            echo 'Usa il campo sottostante per incollare le modifiche allo stile CSS della pagina di login';
  }

  function funzioneCreaHTMLdelPrimoCampo2(){
    // CHIAMATA PRIMA IN AGGIUNGI CAMPI DI OPZIONE
    ?> 

<textarea placeholder="Incolla qui il tuo CSS personalizzato!" id="text_area_paste_custom_css" name="text_area_paste_custom_css">
    
    <?php
    readfile(WP_PLUGIN_DIR . '/toalber-login-customizer/css/prova.txt');
    ?>
   
</textarea>

    <?php  // RIAPRI PHP
}

      function scriviHTML() { ?>
        <div class="wrap">
          <h1>Impostazioni Login Customizer</h1>
          <form action="options.php" method="POST" >
          <?php
          settings_fields('gruppo_di_appartenenza');  // AGGIUNGE FUNZIONI NASCOSTE NEL FORM (NONCE ETC)
          do_settings_sections('pagina-impostazioni');  // PRODUCE IL FORM
          submit_button();
          ?>
          </form>
        </div>
      <?php }

function incoda_css_login(){
    wp_enqueue_style('stiloso-impostazioni-css', WP_PLUGIN_URL . '/toalber-login-customizer/css/stiloso-impostazioni.css');
}

}

$toalberPersonalizzaLoginCreaAdminMenu = new ToalberPersonalizzaLoginCreaAdminMenu();


