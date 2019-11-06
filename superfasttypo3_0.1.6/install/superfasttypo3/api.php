<?php
function superfasttypo3_api_modify_output($output)
{
    $superfasttypo3_plugin_array = array();
    $root = str_replace('/typo3/index.php', '', $_SERVER['SCRIPT_FILENAME']);
    $superfasttypo3Plugins = scandir('superfasttypo3');
    foreach ($superfasttypo3Plugins as $pathname) {
        if (is_dir('superfasttypo3/' . $pathname) && $pathname != '..' && $pathname != '.') {
            $explode = explode('.', $pathname);

            if ($explode[0] == 'activ') {
                require_once 'superfasttypo3/' . $pathname . '/index.php';
                $functionName = 'superfasttypo3_' . trim($explode[1]);
                $superfasttypo3_plugin_array[trim($explode[1])] = $functionName($output, array());
            }
        }
    }
    foreach ($superfasttypo3_plugin_array as $key_plugin => $plugin_marker) {
        foreach ($plugin_marker as $key_marker => $value) {
            $output = str_replace('###superfasttypo3.' . $key_plugin . '.' . $key_marker . '###', $value, $output);
        }
    }
    return $output;
}

?>
