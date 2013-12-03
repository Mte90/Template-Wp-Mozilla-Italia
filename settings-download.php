<?php

add_action( 'admin_init', 'theme_options_init' );
add_action( 'admin_menu', 'theme_options_add_page' );
 
function theme_options_init(){
//register_setting( 'moz_ita_dl_group', 'moz_ita_dl', 'theme_options_validate' );
}
 
function theme_options_add_page() {
add_dashboard_page( __( 'Moz Download', 'moz-ita' ), __( 'Moz Download', 'moz-ita' ), 'read', 'moz-download', 'moz_ita_download' );
}
 
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
<?php settings_fields( 'moz_ita_dl_group' ); ?>
<?php $options = get_option( 'moz_ita_dl' ); ?>
	<h3>Firefox Stable</h3>
<table class="form-table">
<tr valign="top"><th scope="row">Versione</th>
<td>
<input id="moz_ita_dl[versione]" class="regular-text" type="text" name="moz_ita_dl[versione]" 
value="<?php esc_attr_e( $options['versione'] ); ?>" />
</td>
</tr>
<tr valign="top"><th scope="row">Installer Windows</th>
<td>
<input id="moz_ita_dl[installer_windows]" class="regular-text" type="text" name="moz_ita_dl[installer_windows]" 
value="<?php esc_attr_e( $options['installer_windows'] ); ?>" />
</td>
</tr>
<tr valign="top"><th scope="row">Zip Windows</th>
<td>
<input id="moz_ita_dl[zip_windows]" class="regular-text" type="text" name="moz_ita_dl[zip_windows]" 
value="<?php esc_attr_e( $options['zip_windows'] ); ?>" />
</td>
</tr>
<tr valign="top"><th scope="row">Build Linux</th>
<td>
<input id="moz_ita_dl[build_linux]" class="regular-text" type="text" name="moz_ita_dl[build_linux]" 
value="<?php esc_attr_e( $options['build_linux'] ); ?>" />
</td>
</tr>
<tr valign="top"><th scope="row">Build Linux x64</th>
<td>
<input id="moz_ita_dl[build_linux_64]" class="regular-text" type="text" name="moz_ita_dl[build_linux_64]" 
value="<?php esc_attr_e( $options['build_linux_64'] ); ?>" />
</td>
</tr>
<tr valign="top"><th scope="row">Build Mac OSX</th>
<td>
<input id="moz_ita_dl[mac_osx]" class="regular-text" type="text" name="moz_ita_dl[mac_osx]" 
value="<?php esc_attr_e( $options['mac_osx'] ); ?>" />
</td>
</tr>
<tr valign="top"><th scope="row">Langpack Multipiattaforma</th>
<td>
<input id="moz_ita_dl[langpack]" class="regular-text" type="text" name="moz_ita_dl[langpack]" 
value="<?php esc_attr_e( $options['langpack'] ); ?>" />
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
$input['installer_windows'] = wp_filter_nohtml_kses( $input['installer_windows'] );
 
return $input;
}
