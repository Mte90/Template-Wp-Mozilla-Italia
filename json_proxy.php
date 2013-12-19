<?php
if($_GET['type'] == 'firefox') {
	echo file_get_contents('http://svn.mozilla.org/libs/product-details/json/firefox_versions.json');
}elseif($_GET['type'] == 'thunderbird') {
	echo file_get_contents('http://svn.mozilla.org/libs/product-details/json/thunderbird_versions.json');
}elseif($_GET['type'] == 'thunderbird-esr') {
	echo file_get_contents('http://www.mozilla.org/en-US/thunderbird/organizations/all-esr.html');
}elseif($_GET['type'] == 'seamonkey') {
	echo file_get_contents('http://www.seamonkey-project.org/releases/');
}elseif($_GET['type'] == 'lightning') {
	echo file_get_contents('https://addons.mozilla.org/IT/thunderbird/addon/lightning/');
}elseif($_GET['type'] == 'size_firefox_1') {
	echo file_get_contents('http://svn.mozilla.org/libs/product-details/json/firefox_primary_builds.json');
}elseif($_GET['type'] == 'size_firefox_2') {
	echo file_get_contents('http://sourceforge.net/projects/mozilla-italia/files/Mozilla%20Firefox/'.$_GET['version'].'/');
}elseif($_GET['type'] == 'size_firefox_3') {
	echo file_get_contents('http://ftp.mozilla.org/pub/mozilla.org/firefox/releases/'.$_GET['version'].'/linux-x86_64/en-US/');
}elseif($_GET['type'] == 'size_firefox_4') {
	echo file_get_contents('http://ftp.mozilla.org/pub/mozilla.org/firefox/releases/'.$_GET['version'].'/win32/xpi/');
}elseif($_GET['type'] == 'size_thunderbird_1') {
	echo file_get_contents('http://svn.mozilla.org/libs/product-details/json/thunderbird_primary_builds.json');
}elseif($_GET['type'] == 'size_thunderbird_2') {
	echo file_get_contents('http://sourceforge.net/projects/mozilla-italia/files/Mozilla%20Thunderbird/'.$_GET['version'].'/');
}elseif($_GET['type'] == 'size_thunderbird_3') {
	echo file_get_contents('http://ftp.mozilla.org/pub/mozilla.org/thunderbird/releases/'.$_GET['version'].'/linux-x86_64/en-US/');
}elseif($_GET['type'] == 'size_thunderbird_4') {
	echo file_get_contents('http://ftp.mozilla.org/pub/mozilla.org/thunderbird/releases/'.$_GET['version'].'/win32/xpi/');
}elseif($_GET['type'] == 'size_thunderbird_5') {
	echo file_get_contents('http://ftp.mozilla.org/pub/mozilla.org/thunderbird/releases/'.$_GET['version'].'/win32/it/');
}elseif($_GET['type'] == 'size_thunderbird_6') {
	echo file_get_contents('http://ftp.mozilla.org/pub/mozilla.org/thunderbird/releases/'.$_GET['version'].'/linux-i686/it/');
}elseif($_GET['type'] == 'size_thunderbird_7') {
	echo file_get_contents('http://ftp.mozilla.org/pub/mozilla.org/thunderbird/releases/'.$_GET['version'].'/mac/it/');
}elseif($_GET['type'] == 'size_seamonkey_1') {
	echo file_get_contents('http://ftp.mozilla.org/pub/mozilla.org/seamonkey/releases/'.$_GET['version'].'/win32/it/');
}elseif($_GET['type'] == 'size_seamonkey_2') {
	echo file_get_contents('http://sourceforge.net/projects/mozilla-italia/files/SeaMonkey/'.$_GET['version'].'/');
}elseif($_GET['type'] == 'size_seamonkey_3') {
	echo file_get_contents('http://ftp.mozilla.org/pub/mozilla.org/seamonkey/releases/'.$_GET['version'].'/linux-i686/it/');
}elseif($_GET['type'] == 'size_seamonkey_4') {
	echo file_get_contents('http://ftp.mozilla.org/pub/mozilla.org/seamonkey/releases/'.$_GET['version'].'/mac/it/');
}elseif($_GET['type'] == 'size_seamonkey_5') {
	echo file_get_contents('http://ftp.mozilla.org/pub/mozilla.org/seamonkey/releases/'.$_GET['version'].'/langpack/');
}elseif($_GET['type'] == 'size_lightning_1') {
	echo file_get_contents('http://ftp.mozilla.org/pub/calendar/lightning/releases/'.$_GET['version'].'/win32/');
}elseif($_GET['type'] == 'size_lightning_2') {
	echo file_get_contents('http://ftp.mozilla.org/pub/calendar/lightning/releases/'.$_GET['version'].'/linux/');
}elseif($_GET['type'] == 'size_lightning_3') {
	echo file_get_contents('http://ftp.mozilla.org/pub/calendar/lightning/releases/'.$_GET['version'].'/mac/');
}
?>