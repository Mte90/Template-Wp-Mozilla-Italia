<?php
if($_GET['type'] == 'firefox') {
	echo file_get_contents('http://svn.mozilla.org/libs/product-details/json/firefox_versions.json');
}
 ?>