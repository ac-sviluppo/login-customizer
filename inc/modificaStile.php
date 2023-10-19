<?php

if( !defined( 'ABSPATH' )){
	exit;
}


function creaTopLevelHTML(){
    ?>
    <h1>Login Customizer Impostazioni</h1>
    <p>Usa questa sezione per modificare lo stile della pagina di login.</p>
    <?php

    wp_enqueue_media();

if(isset($_POST['just_submitted']) AND $_POST['just_submitted'] == true){

    gestisciForm();
    scriviFile();

} 
?>
<form method="POST">
  <input type="hidden" name="just_submitted" value="true">
  <?php wp_nonce_field('azione_nonce', 'nome_nonce'); ?>
  
  <!-- MODAL MEDIA PER INSERIMENTO LOGO URL -->
  <label for="textarea-logo-url">
  <h2>Immagine Logo</h2>
    <p>Seleziona l'immagine che vuoi usare per il logo della pagina di login.</p>
    </label>
    <div class="contenitore-text-area-logo-url">
    <div class='image-preview-wrapper'>
			<img id='image-preview-logo' src='<?php echo wp_get_attachment_url( get_option( 'nome_del_campo' ) ); ?>' height='100'>
		</div>
		<input id="upload_image_button_logo" type="button" class="button" value="<?php _e( 'Upload image' ); ?>" />
		<input type='hidden' name='image_attachment_id_login_logo' id='image_attachment_id_login_logo' value='<?php echo get_option( 'nome_del_campo' ); ?>'>
    </div>

     <!-- MEDIA MODAL PER INSERIMENTO BACKGROUND URL -->
  <label for="textarea-bg-url">
    <h2>Immagine Sfondo</h2>
    <p> Seleziona l'immagine che vuoi usare per lo sfondo della pagina di login. </p>
    </label>
    <div class="contenitore-textarea-bg-url">
    <div class='image-preview-wrapper'>
			<img id='image-preview-bg' src='<?php echo wp_get_attachment_url( get_option( 'custom-login-bg-url' ) ); ?>' height='100'>
		</div>
		<input id="upload_image_button_bg" type="button" class="button" value="<?php _e( 'Upload image' ); ?>" />
		<input type='hidden' name='image_attachment_id_login_bg' id='image_attachment_id_login_bg' value='<?php echo get_option( 'custom-login-bg-url' ); ?>'>
    </div>

     <!-- BACKGROUND FALLBACK COLOR PICKER -->
  <label for="fallback-bg-color">
    <h2>Colore di Sfondo</h2>
    </label>
    <div class="contenitore-fallback-bg-color">
    <input type="text" name="input_bg_color_picker" id="input_bg_color_picker" value="<?php echo get_option('custom-bg-color') ?>" class="my-color-field" data-default-color="#ffffff" />
    <span class="testo-inline">Usa questo colore per lo sfondo al posto dell'immagine. &nbsp;&nbsp;&nbsp;</span>
    <span class="testo-inline"><input type="checkbox" name="background_override_toggle" value="1" <?php checked(get_option('background_override_toggle'), '1'); ?>></span>
      
    </div>

       <!-- COLORE DEL TESTO -->
  <label for="text-color">
    <h2>Colore del Testo</h2>
    <p>Inserisci il colore del testo del modulo di login.  </p>
    </label>
    <div class="contenitore-text-color">
    <input type="text" name="text_color_picker" id="text_color_picker" value="<?php echo get_option('custom-login-text-color') ?>" class="my-color-field" data-default-color="#000000" />
      </div>

       <!-- COLORE DEL BOTTONE -->
  <label for="button-color">
    <h2>Colore del Pulsante</h2>
    <p>Inserisci il colore del pulsante di accesso e dell'icona "mostra password".  </p>
    </label>
    <div class="contenitore-button-color">
    <input type="text" name="button_color_picker" id="button_color_picker" value="<?php echo get_option('custom-login-button-color') ?>" class="my-color-field" data-default-color="#000000" />
      </div>

    <!-- CHECKBOX LANGUAGE SWITCHER -->
 <label for="language-switcher">
    <h2>Selettore della Lingua</h2>
    </label>
    <div class="contenitore-language-switcher">
    <span>Nascondi selettore della lingua nella pagina di login&nbsp;&nbsp;&nbsp;</span>
    <input type="checkbox" name="language_switcher_toggle" value="1" <?php checked(get_option('language_switcher_toggle', '1')); ?>>
      </div>

       <!-- COLORE DEL FORM -->
  <label for="login-form-color">
    <h2>Colore del Form di Login</h2>
    <p>Inserisci il colore del modulo di login. Nel box di fianco puoi inserire la trasparenza del colore. Puoi indicare un valore da 0 a 100. </p>
    </label>
    <div class="contenitore-login-form-color">
    <input type="text" name="login_form_color" id="login_form_color" value="<?php echo get_option('custom-login-form-color') ?>" class="my-color-field" data-default-color="#000000" />
    <span class="testo-inline">Opacità:</span>
    <input type="number" name="login_form_opacity" id="login_form_opacity" value="<?php echo get_option('custom-login-form-opacity') ?>" style="vertical-align: text-top;" min="0" max="100" />  
    <span class="testo-inline">%</span>
</div>

 <!-- BORDO DEL FORM -->
 <label for="login-border">
    <h2>Bordo del Form di Login</h2>
    <p>Inserisci il colore del bordo del modulo di login e lo spessore nel box di fianco. Puoi indicare un valore da 1 a 10 pixel. Se selezioni 0 il bordo sparisce. </p>
    </label>
    <div class="contenitore-border-form">
    <input type="text" name="login_form_border_color" id="login_form_border_color" value="<?php echo get_option('custom-login-form-border-color') ?>" class="my-color-field" data-default-color="#000000" />
    <span class="testo-inline">Spessore: </span>
    <input type="number" name="login_form_border_px" id="login_form_border_px" value="<?php echo get_option('custom-login-form-border-px') ?>" style="vertical-align: text-top;" min="0" max="10" />
    <span class="testo-inline">px&nbsp;&nbsp;</span>
    <span class="testo-inline">&nbsp;&nbsp;Arrotondamento:</span>
    <input type="number" name="login_form_border_radius" id="login_form_border_radius" value="<?php echo get_option('custom-login-form-border-radius') ?>" style="vertical-align: text-top;" min="0" max="100" />
    <span class="testo-inline">px</span>
</div>

<!-- ALLINEAMENTO LOGIN FORM -->
<label for="login-form-position">
    <h2>Allineamento Orizzontale</h2>
    <p>Scegli se visualizzare il modulo di login al centro, a destra o a sinistra dello schermo. Su smartphone viene visualizzato sempre al centro.   </p>
    </label>
    <div class="contenitore-login-form-position">
   
    <select name="login_form_alignment">
       <option value="0" <?php selected(get_option('login-form-alignment'), '0'); ?>>Al Centro</option>
       <option value="1" <?php selected(get_option('login-form-alignment'), '1'); ?>>A Destra</option>
       <option value="2" <?php selected(get_option('login-form-alignment'), '2'); ?>>A Sinistra</option>
       </select> 

</div>

    <hr>
    <input type="submit" name="submit" id="submit" class="button button-primary" value="Salva Tutto">
</form>
</div>
<?php
  }

 function gestisciForm(){

if(!isset($_POST['input_bg_color_picker'])  || $_POST['input_bg_color_picker'] == '' || $_POST['input_bg_color_picker'] == null){
    $_POST['input_bg_color_picker'] = '#f2f2f2';
}

if(!isset($_POST['text_color_picker']) || $_POST['text_color_picker'] == '' || $_POST['text_color_picker'] == null){
    $_POST['text_color_picker'] = '#000000';
}

if(!isset($_POST['button_color_picker']) || $_POST['button_color_picker'] == '' || $_POST['button_color_picker'] == null){
    $_POST['button_color_picker'] = '#ff2d00';
}

if(!isset($_POST['language_switcher_toggle']) || $_POST['language_switcher_toggle'] == '' || $_POST['language_switcher_toggle'] == null || $_POST['language_switcher_toggle'] == 'undefined'){
    $_POST['language_switcher_toggle'] = '0';
}

if(!isset($_POST['login_form_color']) || $_POST['login_form_color'] == '' || $_POST['login_form_color'] == null){
    $_POST['login_form_color'] = '#ffffff';
}

if(!isset($_POST['login_form_border_color']) || $_POST['login_form_border_color'] == '' || $_POST['login_form_border_color'] == null){
    $_POST['login_form_border_color'] = '#000000';
}

if(!isset($_POST['login_form_alignment']) || $_POST['login_form_alignment'] == '' || $_POST['login_form_alignment'] == null  || $_POST['login_form_alignment'] < 0  || $_POST['login_form_alignment'] > 2){
    $_POST['login_form_alignment'] = '0';
}

if(!isset($_POST['background_override_toggle']) || $_POST['background_override_toggle'] == '' || $_POST['background_override_toggle'] == null || $_POST['language_switcher_toggle'] == 'undefined'){
    $_POST['background_override_toggle'] = '0';
}

  if(wp_verify_nonce($_POST['nome_nonce'], 'azione_nonce') AND current_user_can('manage_options')){
    update_option('nome_del_campo', absint( $_POST['image_attachment_id_login_logo'] )); 
    update_option('custom-login-bg-url', absint( $_POST['image_attachment_id_login_bg'] )); 
    update_option('custom-bg-color', sanitize_text_field($_POST['input_bg_color_picker'])); 
    update_option('custom-login-text-color', sanitize_text_field($_POST['text_color_picker'])); 
    update_option('custom-login-button-color', sanitize_text_field($_POST['button_color_picker'])); 
    update_option('language_switcher_toggle', $_POST['language_switcher_toggle']); 
    update_option('custom-login-form-color', sanitize_text_field($_POST['login_form_color'])); 
    update_option('custom-login-form-opacity', intval($_POST['login_form_opacity'])); 
    update_option('custom-login-form-border-color', sanitize_text_field($_POST['login_form_border_color'])); 
    update_option('custom-login-form-border-px', intval($_POST['login_form_border_px'])); 
    update_option('custom-login-form-border-radius', intval($_POST['login_form_border_radius'])); 
    update_option('login-form-alignment', intval($_POST['login_form_alignment'])); 
    update_option('background_override_toggle', $_POST['background_override_toggle']); 
    ?>
    <div class="updated">
      <p>Le tue impostazioni sono state salvate!!</p>
    </div>
<?php    }else{  ?>
                    <div class="error"><p>Non hai il permesso per fare qu3ste cose. </p></div>
<?php    }
}


function scriviFile(){
    $url_logo = wp_get_attachment_url( get_option( 'nome_del_campo' ) );
    $bg_color = sanitize_text_field($_POST['input_bg_color_picker']);
    $login_text_color = sanitize_text_field($_POST['text_color_picker']);
    $login_button_color = sanitize_text_field($_POST['button_color_picker']);
    $language_switcher = ($_POST['language_switcher_toggle'] == "1") ? 'display:none;' : '';
    $login_form_color = sanitize_text_field($_POST['login_form_color']);
    $login_form_opacity = intval($_POST['login_form_opacity']) / 100;
    $login_form_border_color = sanitize_text_field($_POST['login_form_border_color']);
    $login_form_border_px = intval($_POST['login_form_border_px']);
    $login_form_border_radius = intval($_POST['login_form_border_radius']);
    $login_form_alignment = intval($_POST['login_form_alignment']);

    if($_POST['background_override_toggle'] != '1'){
        $url_bg = wp_get_attachment_url( get_option( 'custom-login-bg-url' ) );  // occhio che il valore in db e un id non un url
    } else{
        $url_bg = '';
    }

    if( $login_form_alignment == '0'){  //al centro
            // lascia il form al centro
            $sposta_form = '';
            $sposta_language_switcher = '';
    }elseif( $login_form_alignment == '1'){  //a destra
             // sposta tutto a destra
             $sposta_form = 'margin-right: 70px;';
             $sposta_language_switcher = 'text-align:right; margin-right: 90px;';
    }elseif( $login_form_alignment == '2'){  //a sinistra
        // sposta tutto a sinistra
        $sposta_form = 'margin-left: 70px;';
        $sposta_language_switcher = 'text-align:left; margin-left: 90px;';
}

    // TRASFORMA LOGIN_FORM_COLOR DA HEX A RGB

    // Togli il hashtag
    $login_form_color_senza_hashtag = substr($login_form_color, 1);

    // Trasforma la stringa hex in array 2+2+2
    $array_login_form_color = str_split($login_form_color_senza_hashtag, 2);

    // Converti i singoli array in dec
    $nuovo_array_dec = array();

    foreach($array_login_form_color as $single_item_hex){
            array_push( $nuovo_array_dec, hexdec($single_item_hex));
    }

    // Aggiungi il quarto elemento (canale alpha)
    array_push( $nuovo_array_dec, $login_form_opacity);

    // Implodi Array : Stringa
    $stringa_da_scrivere = implode(', ', $nuovo_array_dec);

    // ------------------------------------------------------------

    if(get_option('stringa-da-appendere-al-css-loginizer') == '' || get_option('stringa-da-appendere-al-css-loginizer') == null){
        $stringa_temporale = '0000';
    }else{
        $stringa_temporale = get_option('stringa-da-appendere-al-css-loginizer');
    }

    $nuova_stringa_temporale = time();

    rename(WP_PLUGIN_DIR . '/toalber-login-customizer/css/stiloso-login-' . $stringa_temporale . '.css', WP_PLUGIN_DIR . '/toalber-login-customizer/css/stiloso-login-' . $nuova_stringa_temporale . '.css');

    update_option('stringa-da-appendere-al-css-loginizer' ,  $nuova_stringa_temporale);

    $nomefile = WP_PLUGIN_DIR . '/toalber-login-customizer/css/stiloso-login-' . $nuova_stringa_temporale . '.css';
    $apri = fopen($nomefile, 'w');
    $testodascrivere = '.login h1 a{
        background-image: url(';
    $testodascrivere .= $url_logo;
    $testodascrivere .= ')!important;
                        background-size: 180px; width: 180px; height: 180px;
}

body{
    background-image: url(';
    $testodascrivere .= $url_bg;
    $testodascrivere .= ');
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    background-color:';
    $testodascrivere .=  $bg_color;
    $testodascrivere .= ';
    }
    ';
    $testodascrivere .= '#backtoblog a, #nav a, #loginform label{
        color:';
    $testodascrivere .= $login_text_color;
    $testodascrivere .= '!important;
}
';
    $testodascrivere .= '#wp-submit{
        background-color:';
    $testodascrivere .=  $login_button_color;
    $testodascrivere .= '!important;
    border:none!important;
}

.dashicons-visibility::before{
    color:';
    $testodascrivere .=  $login_button_color;
    $testodascrivere .=  '!important;
}
';
    $testodascrivere .= '#language-switcher{';
    $testodascrivere .=  $language_switcher;
    $testodascrivere .= '}
    ';
    $testodascrivere .= '#login{
        background: rgba(';
    $testodascrivere .= $stringa_da_scrivere;
    $testodascrivere .= ');
        padding-bottom: 30px;
        margin-top: 30px;
    ';
    $testodascrivere .= 'border:';
    $testodascrivere .= $login_form_border_px;
    $testodascrivere .= 'px solid ';
    $testodascrivere .= $login_form_border_color;
    $testodascrivere .= ';
                        ';
    $testodascrivere .= 'border-radius:';
    $testodascrivere .= $login_form_border_radius;
    $testodascrivere .= 'px;';
    $testodascrivere .= $sposta_form;
    $testodascrivere .= '}
                        ';
    $testodascrivere .= '#loginform{
                        background:none!important;
                        border:none!important;
                        }
                        body{overflow:hidden;}
                        ';
    $testodascrivere .='.language-switcher{';
    $testodascrivere .= $sposta_language_switcher;
    $testodascrivere .='}
    ';
    $testodascrivere .= '@media screen and (max-width: 576px) {
        #login {
          margin-left:0;
          margin-right:0;
        }
      }';
    $scrivi = fputs($apri, $testodascrivere);
    $chiudi = fclose($apri);
}

  // ----------------------------------------- JS PER IMAGE UPLOADER IMG LOGO ----------------------------

  function media_selector_print_scripts() {

    if( isset($_GET['page']) && $_GET['page'] == 'login-customizer'){

        $my_saved_attachment_logo_id = get_option( 'nome_del_campo', 0 );
        $my_saved_attachment_bg_id = get_option( 'custom-login-bg-url', 0 );  // valore in db e un id 
    
        ?><script type='text/javascript'>
    
            jQuery( document ).ready( function( $ ) {
    
                // Uploading files
                var file_frame;
                var file_frame1;
                var wp_media_post_id = wp.media.model.settings.post.id; // Store the old id
                var set_to_post_id_logo = <?php echo $my_saved_attachment_logo_id; ?>; // Set this
                var set_to_post_id_bg = <?php echo $my_saved_attachment_bg_id; ?>; // Set this
    
                jQuery('#upload_image_button_logo').on('click', function( event ){
    
                    event.preventDefault();
    
                    // If the media frame already exists, reopen it.
                    if ( file_frame ) {
                        // Set the post ID to what we want
                        file_frame.uploader.uploader.param( 'post_id', set_to_post_id_logo );
                        // Open frame
                        file_frame.open();
                        return;
                    } else {
                        // Set the wp.media post id so the uploader grabs the ID we want when initialised
                        wp.media.model.settings.post.id = set_to_post_id_logo;
                    }
    
                    // Create the media frame.
                    file_frame = wp.media.frames.file_frame = wp.media({
                        title: 'Select a image to upload',
                        button: {
                            text: 'Use this image',
                        },
                        multiple: false	// Set to true to allow multiple files to be selected
                    });
    
                    // When an image is selected, run a callback.
                    file_frame.on( 'select', function() {
                        // We set multiple to false so only get one image from the uploader
                        attachment = file_frame.state().get('selection').first().toJSON();
    
                        // Do something with attachment.id and/or attachment.url here
                        $( '#image-preview-logo' ).attr( 'src', attachment.url ).css( 'width', 'auto' );
                        $( '#image_attachment_id_login_logo' ).val( attachment.id );
    
                        // Restore the main post ID
                        wp.media.model.settings.post.id = wp_media_post_id;
                    });
    
                        // Finally, open the modal
                        file_frame.open();
                });
    
    
                jQuery('#upload_image_button_bg').on('click', function( event ){
    
                    event.preventDefault();
    
                    // If the media frame already exists, reopen it.
                    if ( file_frame1 ) {
                        // Set the post ID to what we want
                        file_frame1.uploader.uploader.param( 'post_id', set_to_post_id_bg );
                        // Open frame
                        file_frame1.open();
                        return;
                    } else {
                        // Set the wp.media post id so the uploader grabs the ID we want when initialised
                        wp.media.model.settings.post.id = set_to_post_id_bg;
                    }
    
                    // Create the media frame.
                    file_frame1 = wp.media.frames.file_frame1 = wp.media({
                        title: 'Select a image to upload',
                        button: {
                            text: 'Use this image',
                        },
                        multiple: false	// Set to true to allow multiple files to be selected
                    });
    
                    // When an image is selected, run a callback.
                    file_frame1.on( 'select', function() {
                        // We set multiple to false so only get one image from the uploader
                        attachment = file_frame1.state().get('selection').first().toJSON();
    
                        // Do something with attachment.id and/or attachment.url here
                        $( '#image-preview-bg' ).attr( 'src', attachment.url ).css( 'width', 'auto' );
                        $( '#image_attachment_id_login_bg' ).val( attachment.id );
    
                        // Restore the main post ID
                        wp.media.model.settings.post.id = wp_media_post_id;
                    });
    
                        // Finally, open the modal
                        file_frame1.open();
                    });
    
                // Restore the main ID when the add media button is pressed
                jQuery( 'a.add_media' ).on( 'click', function() {
                    wp.media.model.settings.post.id = wp_media_post_id;
                });
            });
    
        </script><?php
    }
}
