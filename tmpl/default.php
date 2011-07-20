<?php

defined('_JEXEC') or die('=;)');

if ($addSwfobject)
    JHTML::script("swfobject.js", "modules/mod_jmonoslideshow/assets/js/");

$classTxt = '';
if (strlen($moduleclassSfx) != 0) {
    $classTxt = "class = \"$moduleclassSfx\"";
}

$dataFile = JURI::root(true) . '/modules/mod_jmonoslideshow/dataFileProducer.php?reqParams=folder_EQUAL_' . $imageFolderEncoded . '_AND_confXmlName_EQUAL_' . $configXmlName;
?>
<script type="text/javascript">
    var flashvars = {};
    var params = {
        dataFile:"<?php echo $dataFile; ?>"
    };
    var attributes = {wmode: "transparent"};

    swfobject.embedSWF("<?php echo JURI::root(true) ?>/modules/mod_jmonoslideshow/assets/swf/monoslideshow.swf",
    "<?php echo $divId ?>", "<?php echo $flashWidth ?>", "<?php echo $flashHeight ?>", "8", flashvars, params, attributes);

</script>
<div align="<?php echo $alignSlideshow ?>">
    <div  <?php echo $classTxt ?> class="monoslideshow_v1-cont" id="<?php echo $divId ?>">

<?php if (!$addSwfobject) : ?>
            <object width="<?php echo $flashWidth ?>"
                    height="<?php echo $flashHeight ?>"
                type="application/x-shockwave-flash"
                data="<?php echo JURI::root(true); ?>/modules/mod_jmonoslideshow/assets/swf/monoslideshow.swf"
                id="<?php echo $divId ?>_swf"
                style="visibility: visible;">
            <param name="wmode" value="transparent">
            <param name="flashvars" value="dataFile=<?php echo $dataFile; ?>">
            <param name="movie" value="<?php echo JURI::root(true); ?>/modules/mod_jmonoslideshow/assets/swf/monoslideshow.swf"/>
        </object>

<?php endif; ?>





    </div>
</div>
