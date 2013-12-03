<?php

add_action( 'admin_init', 'theme_options_init' );
add_action( 'admin_menu', 'theme_options_add_page' );
 
function theme_options_init(){
//register_setting( 'sample_options', 'sample_theme_options', 'theme_options_validate' );
}
 
function theme_options_add_page() {
add_dashboard_page( __( 'Moz Download', 'moz-ita' ), __( 'Moz Download', 'moz-ita' ), 'read', 'moz-download', 'moz_ita_download' );
}
 
/**
 * Create the options page
 */
function moz_ita_download() {
 
if ( ! isset( $_REQUEST['settings-updated'] ) )
$_REQUEST['settings-updated'] = false;
 
?>
<div class="wrap">
<?php screen_icon(); echo "<h2>" . get_current_theme() . " Download</h2>"; ?>
 
<?php if ( false !== $_REQUEST['settings-updated'] ) : ?>
<div class="updated fade"><p><strong><?php _e( 'Download salvati', 'moz-ita' ); ?></strong></p></div>
<?php endif; ?>
 
<form method="post" action="options.php">
<?php settings_fields( 'sample_options' ); ?>
<?php $options = get_option( 'sample_theme_options' ); ?>
 
<table class="form-table">
<tr valign="top"><th scope="row"><?php _e( 'Some text', 'moz-ita' ); ?></th>
<td>
<input id="sample_theme_options[sometext]" class="regular-text" type="text" name="sample_theme_options[sometext]" 
value="<?php esc_attr_e( $options['sometext'] ); ?>" />
</td>
</tr>
</table>
 
<p class="submit">
<input type="submit" class="button-primary" value="<?php _e( 'Salva Download', 'moz-ita' ); ?>" />
</p>
</form>
</div>
<?php
}
 
/**
 * Sanitize and validate input. Accepts an array, return a sanitized array.
 */
function theme_options_validate( $input ) {
 
// Say our text option must be safe text with no HTML tags
$input['sometext'] = wp_filter_nohtml_kses( $input['sometext'] );
 
return $input;
}
