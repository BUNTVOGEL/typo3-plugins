<?php
if (!defined('TYPO3_MODE')) {
    die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
    'Infochy.' . $_EXTKEY,
    'PluginContent',
    array(
        'Content' => 'list, show, new, create, edit, update, delete',

    ),
    // non-cacheable actions
    array(
        'Content' => 'list, show, new, create, edit, update, delete',

    )
);
