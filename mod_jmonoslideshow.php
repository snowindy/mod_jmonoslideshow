<?php

//-- No direct access
defined('_JEXEC') or die('=;)');

// get parameters from the module's configuration

$addSwfobject = $params->get('addSwfobject', '1');

$alignSlideshow = $params->get('alignSlideshow', 'center');

//echo "---------$alignSlideshow";

$moduleclassSfx = $params->get('moduleclassSfx', '');

//print_r($params);

$flashWidth = $params->get('flashWidth', '600');
$flashHeight = $params->get('flashHeight', '250');

$divId = $params->get('divId', 'monoslideshow');

$imageFolder = $params->get('imageFolder', 'no_folder');

$listSep = "_SPR_";
$imageFolderEncoded = base64_encode ( $imageFolder); 

$configXmlName = $params->get('configXmlName', 'no_config');

$imageUrlsString = "";
$max = 10;
for ($i = 1; $i <= 10; $i++) {
	$imageUrlsString .= $params->get('imageUrl'.$i, '');
	if ($max > $i){
		$imageUrlsString .= $listSep;
	}
}

$imageUrlsEncoded = base64_encode ($imageUrlsString );

// include the template for display
require(JModuleHelper::getLayoutPath('mod_jmonoslideshow'));