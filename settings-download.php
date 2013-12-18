<?php
add_action('admin_init', 'theme_options_init');
add_action('admin_menu', 'theme_options_add_page');

function theme_options_init() {
//register_setting( 'moz_ita_dl_group', 'moz_ita_dl', 'theme_options_validate' );
}

function theme_options_add_page() {
	add_dashboard_page(__('Moz Download', 'moz-ita'), __('Moz Download', 'moz-ita'), 'read', 'moz-download', 'moz_ita_download');
}

function moz_ita_download() {

	if (!isset($_REQUEST['settings-updated']))
		$_REQUEST['settings-updated'] = false;
	?>

	<script>
		jQuery(document).ready(function() {
			function firefox(version) {
				jQuery('#moz_ita_dl-fs').val(version);
				jQuery('#moz_ita_dl-fs-installer_windows').val('http://download.mozilla.org/?product=firefox-' + version + '&os=win&lang=it');
				jQuery('#moz_ita_dl-fs-zip_windows').val('http://sourceforge.net/projects/mozilla-italia/files/Mozilla%20Firefox/26.0/firefox-' + version + '-it.win32.zip/download');
				jQuery('#moz_ita_dl-fs-build_linux').val('http://download.mozilla.org/?product=firefox-' + version + '&os=linux&lang=it');
				jQuery('#moz_ita_dl-fs-build_linux_64').val('http://download.mozilla.org/?product=firefox-' + version + '&os=linux64&lang=it');
				jQuery('#moz_ita_dl-fs-mac_osx').val('http://download.mozilla.org/?product=firefox-' + version + '&os=osx&lang=it');
				jQuery('#moz_ita_dl-fs-langpack').val('http://releases.mozilla.org/pub/mozilla.org/firefox/releases/' + version + '/win32/xpi/it.xpi');
			}
			function firefox_size() {
				var ver = jQuery('#moz_ita_dl-fs').val();
				if(ver === '') { alert('Versione non presente'); }
				else {
					jQuery.getJSON("<? echo get_stylesheet_directory_uri(); ?>/json_proxy.php?type=size_firefox_1", function(data) {
						jQuery('#moz_ita_dl-fs-installer_windows-size').val(data.it[ver].Windows.filesize);
						jQuery('#moz_ita_dl-fs-mac_osx-size').val(data.it[ver]['OS X'].filesize);
						jQuery('#moz_ita_dl-fs-build_linux-size').val(data.it[ver].Linux.filesize);
					});
					jQuery.ajax({url: '<? echo get_stylesheet_directory_uri(); ?>/json_proxy.php?type=seamonkey', success: function(data) {
						jQuery('#moz_ita_dl-fs-zip_windows-size').val(jQuery(data).find('[headers="files_size_h"]').html());
					}});
				}
			}
			firefox_size();
			function firefox_esr(version) {
				jQuery('#moz_ita_dl-fesr').val(version);
				jQuery('#moz_ita_dl-f_esr-installer_windows').val('http://download.mozilla.org/?product=firefox-' + version + '&os=win&lang=it');
				jQuery('#moz_ita_dl-f_esr-build_linux').val('http://download.mozilla.org/?product=firefox-' + version + '&os=linux&lang=it');
				jQuery('#moz_ita_dl-f_esr-build_linux_64').val('http://download.mozilla.org/?product=firefox-' + version + '&os=linux64&lang=it');
				jQuery('#moz_ita_dl-f_esr-mac_osx').val('http://download.mozilla.org/?product=firefox-' + version + '&os=osx&lang=it');
			}
			function thunderbird(version) {
				jQuery('#moz_ita_dl-ts').val(version);
				jQuery('#moz_ita_dl-ts-installer_windows').val('http://download.mozilla.org/?product=thunderbird-' + version + '&os=win&lang=it');
				jQuery('#moz_ita_dl-ts-zip_windows').val('http://sourceforge.net/projects/mozilla-italia/files/Mozilla%20Firefox/26.0/thunderbird-' + version + '-it.win32.zip/download');
				jQuery('#moz_ita_dl-ts-build_linux').val('http://download.mozilla.org/?product=thunderbird-' + version + '&os=linux&lang=it');
				jQuery('#moz_ita_dl-ts-build_linux_64').val('http://download.mozilla.org/?product=thunderbird-' + version + '&os=linux64&lang=it');
				jQuery('#moz_ita_dl-ts-mac_osx').val('http://download.mozilla.org/?product=thunderbird-' + version + '&os=osx&lang=it');
				jQuery('#moz_ita_dl-ts-langpack').val('http://releases.mozilla.org/pub/mozilla.org/thunderbird/releases/' + version + '/win32/xpi/it.xpi');
			}
			function thunderbird_esr(version) {
				jQuery('#moz_ita_dl-tesr').val(version);
				jQuery('#moz_ita_dl-t_esr-installer_windows').val('http://download.mozilla.org/?product=firefox-' + version + '&os=win&lang=it');
				jQuery('#moz_ita_dl-t_esr-build_linux').val('http://download.mozilla.org/?product=firefox-' + version + '&os=linux&lang=it');
				jQuery('#moz_ita_dl-t_esr-build_linux_64').val('http://download.mozilla.org/?product=firefox-' + version + '&os=linux64&lang=it');
				jQuery('#moz_ita_dl-t_esr-mac_osx').val('http://download.mozilla.org/?product=firefox-' + version + '&os=osx&lang=it');
			}
			function seamonkey(version) {
				jQuery('#moz_ita_dl-s').val(version);
				jQuery('#moz_ita_dl-s-installer_windows').val('http://download.mozilla.org/?product=seamonkey-' + version + '&os=win&lang=it');
				jQuery('#moz_ita_dl-s-zip_windows').val('http://ftp.mozilla.org/pub/seamonkey/releases/' + version + '/win32/it/seamonkey-' + version + ' .zip');
				jQuery('#moz_ita_dl-s-build_linux').val('http://download.mozilla.org/?product=seamonkey-' + version + '&os=linux&lang=it');
				jQuery('#moz_ita_dl-s-build_linux_64').val('http://downloads.sourceforge.net/mozilla-italia/seamonkey-' + version + '.it.linux-x86_64.tar.bz2');
				jQuery('#moz_ita_dl-s-mac_osx').val('http://download.mozilla.org/?product=seamonkey-' + version + '&os=osx&lang=it');
				jQuery('#moz_ita_dl-s-langpack').val('http://ftp.mozilla.org/pub/seamonkey/releases/' + version + '/langpack/seamonkey-' + version + '.it.langpack.xpi');
			}
			function lightning(version) {
				jQuery('#moz_ita_dl-l').val(version);
				jQuery('#moz_ita_dl-l-windows').val('http://ftp.mozilla.org/pub/calendar/lightning/releases/' + version + '/win32/lightning.xpi');
				jQuery('#moz_ita_dl-l-build_linux').val('http://ftp.mozilla.org/pub/calendar/lightning/releases/' + version + '/linux/lightning.xpi');
				jQuery('#moz_ita_dl-l-mac_osx').val('http://ftp.mozilla.org/pub/calendar/lightning/releases/' + version + '/mac/lightning.xpi');
			}
			jQuery(".load-software").click(function() {
				jQuery.getJSON("<? echo get_stylesheet_directory_uri(); ?>/json_proxy.php?type=firefox", function(data) {
					//Firefox Stable
					firefox(data.LATEST_FIREFOX_VERSION);
					firefox_size();
					//Firefox ESR
					firefox_esr(data.FIREFOX_ESR);
				});
				jQuery.getJSON("<? echo get_stylesheet_directory_uri(); ?>/json_proxy.php?type=thunderbird", function(data) {
					//Thunderbird Stable
					thunderbird(data.LATEST_THUNDERBIRD_VERSION);
				});
				jQuery.ajax({url: '<? echo get_stylesheet_directory_uri(); ?>/json_proxy.php?type=thunderbird-esr', success: function(result) {
						var t_esr = jQuery(result).find('#it td:nth-child(3)').html();
						//Thunderbird ESR
						thunderbird_esr(t_esr);
					}});
				jQuery.ajax({url: '<? echo get_stylesheet_directory_uri(); ?>/json_proxy.php?type=seamonkey', success: function(result) {
						var s = jQuery(result).find('#it .curVersion').html();
						//Seamonkey
						seamonkey(s);
					}});
				jQuery.ajax({url: '<? echo get_stylesheet_directory_uri(); ?>/json_proxy.php?type=lightning', success: function(result) {
						var l = jQuery(result).find('.version-number').html();
						//Lightning
						lightning(l);
					}});
			});
		});
	</script>

	<div class="wrap">
	<?php screen_icon();
	echo "<h2>" . get_current_theme() . " Download</h2>"; ?>
		<p class="submit">
			<input type="submit" class="button-primary load-software" value="<?php _e('Carica tutte le versioni', 'moz-ita'); ?>" />
		</p>

		<?php if (false !== $_REQUEST['settings-updated']) : ?>
			<div class="updated fade"><p><strong><?php _e('Download salvati', 'moz-ita'); ?></strong></p></div>
		<?php endif; ?>

		<form method="post" action="options.php">
			<?php settings_fields('moz_ita_dl_group'); ?>
			<?php $options = get_option('moz_ita_dl'); ?>

			<h3>Firefox Stable<span id="firefox"></span></h3>

			<table class="form-table">
				<tr valign="top"><th scope="row">Versione</th>
					<td>
						<input id="moz_ita_dl-fs" class="regular-text" type="text" name="moz_ita_dl-fs" value="<?php esc_attr_e($options['fs']); ?>" />
						<p class="submit">
							<input type="submit" class="button-primary load-ff" value="<?php _e('Carica la versione', 'moz-ita'); ?>" />
						</p>
					</td>
				</tr>
				<tr valign="top"><th scope="row">Installer Windows</th>
					<td>
						<input id="moz_ita_dl-fs-installer_windows" class="regular-text" type="text" name="moz_ita_dl-fs-installer_windows" value="<?php esc_attr_e($options['fs-installer_windows']); ?>" />
						<input id="moz_ita_dl-fs-installer_windows-size" class="small-text" type="text" name="moz_ita_dl-fs-installer_windows-size" value="<?php esc_attr_e($options['fs-installer_windows-size']); ?>" />
					</td>
				</tr>
				<tr valign="top"><th scope="row">Zip Windows</th>
					<td>
						<input id="moz_ita_dl-fs-zip_windows" class="regular-text" type="text" name="moz_ita_dl-fs-zip_windows" value="<?php esc_attr_e($options['fs-zip_windows']); ?>" />
						<input id="moz_ita_dl-fs-zip_windows-size" class="small-text" type="text" name="moz_ita_dl-fs-zip_windows-size" value="<?php esc_attr_e($options['fs-zip_windows-size']); ?>" />
					</td>
				</tr>
				<tr valign="top"><th scope="row">Build Linux</th>
					<td>
						<input id="moz_ita_dl-fs-build_linux" class="regular-text" type="text" name="moz_ita_dl-fs-build_linux" value="<?php esc_attr_e($options['fs-build_linux']); ?>" />
						<input id="moz_ita_dl-fs-build_linux-size" class="small-text" type="text" name="moz_ita_dl-fs-build_linux-size" value="<?php esc_attr_e($options['fs-build_linux-size']); ?>" />
					</td>
				</tr>
				<tr valign="top"><th scope="row">Build Linux x64</th>
					<td>
						<input id="moz_ita_dl-fs-build_linux_64" class="regular-text" type="text" name="moz_ita_dl-fs-build_linux_64" value="<?php esc_attr_e($options['fs-build_linux_64']); ?>" />
						<input id="moz_ita_dl-fs-build_linux_64-size" class="small-text" type="text" name="moz_ita_dl-fs-build_linux_64-size" value="<?php esc_attr_e($options['fs-build_linux_64-size']); ?>" />
					</td>
				</tr>
				<tr valign="top"><th scope="row">Build Mac OSX</th>
					<td>
						<input id="moz_ita_dl-fs-mac_osx" class="regular-text" type="text" name="moz_ita_dl-fs-mac_osx" value="<?php esc_attr_e($options['fs-mac_osx']); ?>" />
						<input id="moz_ita_dl-fs-mac_osx-size" class="small-text" type="text" name="moz_ita_dl-fs-mac_osx-size" value="<?php esc_attr_e($options['fs-mac_osx-size']); ?>" />
					</td>
				</tr>
				<tr valign="top"><th scope="row">Langpack Multipiattaforma</th>
					<td>
						<input id="moz_ita_dl-fs-langpack" class="regular-text" type="text" name="moz_ita_dl-fs-langpack" value="<?php esc_attr_e($options['fs-langpack']); ?>" />
						<input id="moz_ita_dl-fs-langpack-size" class="small-text" type="text" name="moz_ita_dl-fs-langpack-size" value="<?php esc_attr_e($options['fs-langpack-size']); ?>" />
					</td>
				</tr>
			</table>

			<h3>Firefox ESR<span id="firefox-esr"></span></h3>

			<table class="form-table">
				<tr valign="top"><th scope="row">Versione</th>
					<td>
						<input id="moz_ita_dl-fesr" class="regular-text" type="text" name="moz_ita_dl-fesr" value="<?php esc_attr_e($options['fesr']); ?>" />
						<p class="submit">
							<input type="submit" class="button-primary load-fesr" value="<?php _e('Carica la versione', 'moz-ita'); ?>" />
						</p>
					</td>
				</tr>
				<tr valign="top"><th scope="row">Installer Windows</th>
					<td>
						<input id="moz_ita_dl-f_esr-installer_windows" class="regular-text" type="text" name="moz_ita_dl-f_esr-installer_windows" value="<?php esc_attr_e($options['f_esr-installer_windows']); ?>" />
						<input id="moz_ita_dl-f_esr-installer_windows-size" class="small-text" type="text" name="moz_ita_dl-f_esr-installer_windows-size" value="<?php esc_attr_e($options['f_esr-installer_windows-size']); ?>" />
					</td>
				</tr>
				<tr valign="top"><th scope="row">Build Linux</th>
					<td>
						<input id="moz_ita_dl-f_esr-build_linux" class="regular-text" type="text" name="moz_ita_dl-f_esr-build_linux" value="<?php esc_attr_e($options['f_esr-build_linux']); ?>" />
						<input id="moz_ita_dl-f_esr-build_linux-size" class="small-text" type="text" name="moz_ita_dl-f_esr-build_linux-size" value="<?php esc_attr_e($options['f_esr-build_linux-size']); ?>" />
					</td>
				</tr>
				<tr valign="top"><th scope="row">Build Linux x64</th>
					<td>
						<input id="moz_ita_dl-f_esr-build_linux_64" class="regular-text" type="text" name="moz_ita_dl-f_esr-build_linux_64" value="<?php esc_attr_e($options['f_esr-build_linux_64']); ?>" />
						<input id="moz_ita_dl-f_esr-build_linux_64-size" class="small-text" type="text" name="moz_ita_dl-f_esr-build_linux_64-size" value="<?php esc_attr_e($options['f_esr-build_linux_64-size']); ?>" />
					</td>
				</tr>
				<tr valign="top"><th scope="row">Build Mac OSX</th>
					<td>
						<input id="moz_ita_dl-f_esr-mac_osx" class="regular-text" type="text" name="moz_ita_dl-f_esr-mac_osx" value="<?php esc_attr_e($options['f_esr-mac_osx']); ?>" />
						<input id="moz_ita_dl-f_esr-mac_osx-size" class="small-text" type="text" name="moz_ita_dl-f_esr-mac_osx-size" value="<?php esc_attr_e($options['f_esr-mac_osx-size']); ?>" />
					</td>
				</tr>
			</table>

			<h3>Thunderbird Stable<span id="thunderbird"></span></h3>

			<table class="form-table">
				<tr valign="top"><th scope="row">Versione</th>
					<td>
						<input id="moz_ita_dl-ts" class="regular-text" type="text" name="moz_ita_dl-ts" value="<?php esc_attr_e($options['ts']); ?>" />
						<p class="submit">
							<input type="submit" class="button-primary load-ts" value="<?php _e('Carica la versione', 'moz-ita'); ?>" />
						</p>
					</td>
				</tr>
				<tr valign="top"><th scope="row">Installer Windows</th>
					<td>
						<input id="moz_ita_dl-ts-installer_windows" class="regular-text" type="text" name="moz_ita_dl-ts-installer_windows" value="<?php esc_attr_e($options['ts-installer_windows']); ?>" />
						<input id="moz_ita_dl-ts-installer_windows-size" class="small-text" type="text" name="moz_ita_dl-ts-installer_windows-size" value="<?php esc_attr_e($options['ts-installer_windows-size']); ?>" />
					</td>
				</tr>
				<tr valign="top"><th scope="row">Zip Windows</th>
					<td>
						<input id="moz_ita_dl-ts-zip_windows" class="regular-text" type="text" name="moz_ita_dl-ts-zip_windows" value="<?php esc_attr_e($options['ts-zip_windows']); ?>" />
						<input id="moz_ita_dl-ts-zip_windows-size" class="small-text" type="text" name="moz_ita_dl-ts-zip_windows-size" value="<?php esc_attr_e($options['ts-zip_windows-size']); ?>" />
					</td>
				</tr>
				<tr valign="top"><th scope="row">Build Linux</th>
					<td>
						<input id="moz_ita_dl-ts-build_linux" class="regular-text" type="text" name="moz_ita_dl-ts-build_linux" value="<?php esc_attr_e($options['ts-build_linux']); ?>" />
						<input id="moz_ita_dl-ts-build_linux-size" class="small-text" type="text" name="moz_ita_dl-ts-build_linux-size" value="<?php esc_attr_e($options['ts-build_linux-size']); ?>" />
					</td>
				</tr>
				<tr valign="top"><th scope="row">Build Linux x64</th>
					<td>
						<input id="moz_ita_dl-ts-build_linux_64" class="regular-text" type="text" name="moz_ita_dl-ts-build_linux_64" value="<?php esc_attr_e($options['ts-build_linux_64']); ?>" />
						<input id="moz_ita_dl-ts-build_linux_64-size" class="small-text" type="text" name="moz_ita_dl-ts-build_linux_64-size" value="<?php esc_attr_e($options['ts-build_linux_64-size']); ?>" />
					</td>
				</tr>
				<tr valign="top"><th scope="row">Build Mac OSX</th>
					<td>
						<input id="moz_ita_dl-ts-mac_osx" class="regular-text" type="text" name="moz_ita_dl-ts-mac_osx" value="<?php esc_attr_e($options['ts-mac_osx']); ?>" />
						<input id="moz_ita_dl-ts-mac_osx-size" class="small-text" type="text" name="moz_ita_dl-ts-mac_osx-size" value="<?php esc_attr_e($options['ts-mac_osx-size']); ?>" />
					</td>
				</tr>
				<tr valign="top"><th scope="row">Langpack Multipiattaforma</th>
					<td>
						<input id="moz_ita_dl-ts-langpack" class="regular-text" type="text" name="moz_ita_dl-ts-langpack" value="<?php esc_attr_e($options['ts-langpack']); ?>" />
						<input id="moz_ita_dl-ts-langpack-size" class="small-text" type="text" name="moz_ita_dl-ts-langpack-size" value="<?php esc_attr_e($options['ts-langpack-size']); ?>" />
					</td>
				</tr>
			</table>

			<h3>Thunderbird ESR<span id="thunderbird-esr"></span></h3>

			<table class="form-table">
				<tr valign="top"><th scope="row">Versione</th>
					<td>
						<input id="moz_ita_dl-tesr" class="regular-text" type="text" name="moz_ita_dl-tesr" value="<?php esc_attr_e($options['tesr']); ?>" />
						<p class="submit">
							<input type="submit" class="button-primary load-tesr" value="<?php _e('Carica la versione', 'moz-ita'); ?>" />
						</p>
					</td>
				</tr>
				<tr valign="top"><th scope="row">Installer Windows</th>
					<td>
						<input id="moz_ita_dl-t_esr-installer_windows" class="regular-text" type="text" name="moz_ita_dl-t_esr-installer_windows" value="<?php esc_attr_e($options['t_esr-installer_windows']); ?>" />
						<input id="moz_ita_dl-t_esr-installer_windows-size" class="small-text" type="text" name="moz_ita_dl-t_esr-installer_windows-size" value="<?php esc_attr_e($options['t_esr-installer_windows-size']); ?>" />
					</td>
				</tr>
				<tr valign="top"><th scope="row">Build Linux</th>
					<td>
						<input id="moz_ita_dl-t_esr-build_linux" class="regular-text" type="text" name="moz_ita_dl-t_esr-build_linux" value="<?php esc_attr_e($options['t_esr-build_linux']); ?>" />
						<input id="moz_ita_dl-t_esr-build_linux-size" class="small-text" type="text" name="moz_ita_dl-t_esr-build_linux-size" value="<?php esc_attr_e($options['t_esr-build_linux-size']); ?>" />
					</td>
				</tr>
				<tr valign="top"><th scope="row">Build Linux x64</th>
					<td>
						<input id="moz_ita_dl-t_esr-build_linux_64" class="regular-text" type="text" name="moz_ita_dl-t_esr-build_linux_64" value="<?php esc_attr_e($options['t_esr-build_linux_64']); ?>" />
						<input id="moz_ita_dl-t_esr-build_linux_64-size" class="small-text" type="text" name="moz_ita_dl-t_esr-build_linux_64-size" value="<?php esc_attr_e($options['t_esr-build_linux_64-size']); ?>" />
					</td>
				</tr>
				<tr valign="top"><th scope="row">Build Mac OSX</th>
					<td>
						<input id="moz_ita_dl-t_esr-mac_osx" class="regular-text" type="text" name="moz_ita_dl-t_esr-mac_osx" value="<?php esc_attr_e($options['t_esr-mac_osx']); ?>" />
						<input id="moz_ita_dl-t_esr-mac_osx-size" class="small-text" type="text" name="moz_ita_dl-t_esr-mac_osx-size" value="<?php esc_attr_e($options['t_esr-mac_osx-size']); ?>" />
					</td>
				</tr>
			</table>

			<h3>Seamonkey<span id="seamonkey"></span></h3>

			<table class="form-table">
				<tr valign="top"><th scope="row">Versione</th>
					<td>
						<input id="moz_ita_dl-s" class="regular-text" type="text" name="moz_ita_dl-s" value="<?php esc_attr_e($options['s']); ?>" />
						<p class="submit">
							<input type="submit" class="button-primary load-s" value="<?php _e('Carica la versione', 'moz-ita'); ?>" />
						</p>
					</td>
				</tr>
				<tr valign="top"><th scope="row">Installer Windows</th>
					<td>
						<input id="moz_ita_dl-s-installer_windows" class="regular-text" type="text" name="moz_ita_dl-s-installer_windows" value="<?php esc_attr_e($options['s-installer_windows']); ?>" />
						<input id="moz_ita_dl-s-installer_windows-size" class="small-text" type="text" name="moz_ita_dl-s-installer_windows-size" value="<?php esc_attr_e($options['s-installer_windows-size']); ?>" />
					</td>
				</tr>
				<tr valign="top"><th scope="row">Zip Windows</th>
					<td>
						<input id="moz_ita_dl-s-zip_windows" class="regular-text" type="text" name="moz_ita_dl-s-zip_windows" value="<?php esc_attr_e($options['s-zip_windows']); ?>" />
						<input id="moz_ita_dl-s-zip_windows-size" class="small-text" type="text" name="moz_ita_dl-s-zip_windows-size" value="<?php esc_attr_e($options['s-zip_windows-size']); ?>" />
					</td>
				</tr>
				<tr valign="top"><th scope="row">Build Linux</th>
					<td>
						<input id="moz_ita_dl-s-build_linux" class="regular-text" type="text" name="moz_ita_dl-s-build_linux" value="<?php esc_attr_e($options['s-build_linux']); ?>" />
						<input id="moz_ita_dl-s-build_linux-size" class="small-text" type="text" name="moz_ita_dl-s-build_linux-size" value="<?php esc_attr_e($options['s-build_linux-size']); ?>" />
					</td>
				</tr>
				<tr valign="top"><th scope="row">Build Linux x64</th>
					<td>
						<input id="moz_ita_dl-s-build_linux_64" class="regular-text" type="text" name="moz_ita_dl-s-build_linux_64" value="<?php esc_attr_e($options['s-build_linux_64']); ?>" />
						<input id="moz_ita_dl-s-build_linux_64-size" class="small-text" type="text" name="moz_ita_dl-s-build_linux_64-size" value="<?php esc_attr_e($options['s-build_linux_64-size']); ?>" />
					</td>
				</tr>
				<tr valign="top"><th scope="row">Build Mac OSX</th>
					<td>
						<input id="moz_ita_dl-s-mac_osx" class="regular-text" type="text" name="moz_ita_dl-s-mac_osx" value="<?php esc_attr_e($options['s-mac_osx']); ?>" />
						<input id="moz_ita_dl-s-mac_osx-size" class="small-text" type="text" name="moz_ita_dl-s-mac_osx-size" value="<?php esc_attr_e($options['s-mac_osx-size']); ?>" />
					</td>
				</tr>
				<tr valign="top"><th scope="row">Langpack Multipiattaforma</th>
					<td>
						<input id="moz_ita_dl-s-langpack" class="regular-text" type="text" name="moz_ita_dl-s-langpack" value="<?php esc_attr_e($options['s-langpack']); ?>" />
						<input id="moz_ita_dl-s-langpack-size" class="small-text" type="text" name="moz_ita_dl-s-langpack-size" value="<?php esc_attr_e($options['s-langpack-size']); ?>" />
					</td>
				</tr>
			</table>

			<h3>Lightning<span id="lightning"></span></h3>

			<table class="form-table">
				<tr valign="top"><th scope="row">Versione</th>
					<td>
						<input id="moz_ita_dl-l" class="regular-text" type="text" name="moz_ita_dl-ls" value="<?php esc_attr_e($options['ls']); ?>" />
						<p class="submit">
							<input type="submit" class="button-primary load-l" value="<?php _e('Carica la versione', 'moz-ita'); ?>" />
						</p>
					</td>
				</tr>
				<tr valign="top"><th scope="row">Build Windows</th>
					<td>
						<input id="moz_ita_dl-l-windows" class="regular-text" type="text" name="moz_ita_dl-l-zip_windows" value="<?php esc_attr_e($options['l-zip_windows']); ?>" />
						<input id="moz_ita_dl-l-windows-size" class="small-text" type="text" name="moz_ita_dl-l-zip_windows-size" value="<?php esc_attr_e($options['l-zip_windows-size']); ?>" />
					</td>
				</tr>
				<tr valign="top"><th scope="row">Build Linux</th>
					<td>
						<input id="moz_ita_dl-l-build_linux" class="regular-text" type="text" name="moz_ita_dl-l-build_linux" value="<?php esc_attr_e($options['l-build_linux']); ?>" />
						<input id="moz_ita_dl-l-build_linux-size" class="small-text" type="text" name="moz_ita_dl-l-build_linux-size" value="<?php esc_attr_e($options['l-build_linux-size']); ?>" />
					</td>
				</tr>
				<tr valign="top"><th scope="row">Build Mac OSX</th>
					<td>
						<input id="moz_ita_dl-l-mac_osx" class="regular-text" type="text" name="moz_ita_dl-lr-mac_osx" value="<?php esc_attr_e($options['l-mac_osx']); ?>" />
						<input id="moz_ita_dl-l-mac_osx-size" class="small-text" type="text" name="moz_ita_dl-l-mac_osx-size" value="<?php esc_attr_e($options['l-mac_osx-size']); ?>" />
					</td>
				</tr>
			</table>

			<p class="submit">
				<input type="submit" class="button-primary" value="<?php _e('Salva Download', 'moz-ita'); ?>" />
			</p>
		</form>
		<p class="submit">
			<input type="submit" class="button-primary load-software" value="<?php _e('Carica tutte le versioni', 'moz-ita'); ?>" />
		</p>
	</div>
	<?php
}

/**
 * Sanitize and validate input. Accepts an array, return a sanitized array.
 */
function theme_options_validate($input) {

// Say our text option must be safe text with no HTML tags
	$input['installer_windows'] = wp_filter_nohtml_kses($input['installer_windows']);

	return $input;
}
