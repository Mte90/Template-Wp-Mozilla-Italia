<?php
if($_GET['type'] == 'firefox') {
	echo file_get_contents('http://svn.mozilla.org/libs/product-details/json/firefox_versions.json');
}elseif($_GET['type'] == 'thunderbird') {
	echo file_get_contents('http://svn.mozilla.org/libs/product-details/json/thunderbird_versions.json');
}elseif($_GET['type'] == 'thunderbird-esr') {
	echo file_get_contents('http://www.mozilla.org/en-US/thunderbird/organizations/all-esr.html');
}elseif($_GET['type'] == 'seamonkey') {
	echo file_get_contents('http://www.seamonkey-project.org/releases/');
}
?>