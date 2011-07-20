<?php

$reqParam = $_GET['reqParams'];

$vars = split("_AND_", $reqParam);
$folderArr = split('_EQUAL_', $vars[0]);
$folder = $folderArr[1];

$folder = str_replace('_SEPARATOR_', '/', $folder);

$configXMLArr = split('_EQUAL_', $vars[1]);
$configXML = $configXMLArr[1];


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

foreach ($files as $value) {
    $strToAdd .= "<img src=\"$value\" />
    ";
}
$strToAdd .= '';

$configPath = "../../media/monoslideshow_v1/$configXML";

$configContent = file_get_contents($configPath, true);

$config = str_replace('_IMAGES_INSERT_HERE_', $strToAdd, $configContent);

$config = str_replace('_IMAGE_PATH_INSERT_HERE_', $imagePathInsert, $config);


echo $config;
?>



