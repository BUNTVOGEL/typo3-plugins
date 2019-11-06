<?php
function superfasttypo3_welt($output, $plugin_marker)
{
    // 	superfasttypo3 -> API-Name
    //  welt -> Plugin-Name
    //  fast -> Plugin-Marker
    // ###superfasttypo3.welt.fast###
    $plugin_marker['fast'] = time() . " <strong> Typo3 superfast!</strong>";
    return $plugin_marker;
}

?>
