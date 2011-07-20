<?php

$reqParam = $_GET['reqParams'];

$vars = split("_AND_", $reqParam);
$folderArr = split('_EQUAL_', $vars[0]);
$folder = base64_decode($folderArr[1]);

$configXMLArr = split('_EQUAL_', $vars[1]);
$configXML = $configXMLArr[1];

$imageUrlArr = split('_EQUAL_', $vars[2]);
$imageUrlsString = base64_decode($imageUrlArr[1]);
$imageUrls = split('_SPR_', $imageUrlsString);

$dir = "../../$folder";

$files = array();
$iter = 0;
if (is_dir($dir)) {
    if ($dh = opendir($dir)) {
        while (($file = readdir($dh)) !== false) {
            if ($file == '.' || $file == '..') {

            } else {
                $files[$iter++] = $file;
            }
        }
        closedir($dh);
    }
}

$imagePathInsert = " imagePath=\"$dir\" ";

$strToAdd = '';

//print_r($imageUrls);

$iter = 0;
foreach ($files as $value) {
    $strToAdd .= "<img src=\"$value\" ";
	if (!empty($imageUrls[$iter])){
		$strToAdd .= "link=\"".$imageUrls[$iter]."\"";
	}
	$iter++;
	$strToAdd .="/>
	";
	
}
$strToAdd .= '';

$configPath = "../../media/jmonoslideshow/$configXML";

if (!file_exists($configPath)){
	$configPath = "./default_config/default_config.xml_";		
}

$configContent = file_get_contents($configPath, true);

$config = str_replace('_IMAGES_INSERT_HERE_', $strToAdd, $configContent);

$config = str_replace('_IMAGE_PATH_INSERT_HERE_', $imagePathInsert, $config);


echo $config;
?>



