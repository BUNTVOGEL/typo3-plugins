<?php
function superfasttypo3_hallo($output, $plugin_marker)
{
    // 	superfasttypo3 -> API-Name
    //  hallo -> Plugin-Name
    //  fast -> Plugin-Marker
    // ###superfasttypo3.hallo.fast###
    $plugin_marker['fast'] = time() . " <strong> Typo3 superfast!</strong>";
    return $plugin_marker;
}

?>
