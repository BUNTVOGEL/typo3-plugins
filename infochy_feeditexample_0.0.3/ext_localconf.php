<?php
if (!defined('TYPO3_MODE')) {
    die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
    'Infochy.' . $_EXTKEY,
    'Pluginmydata',
    array(
        'MyData' => 'list, new, show, create, edit, update, delete, logout, disable, enable',

    ),
    // non-cacheable actions
    array(
        'MyData' => 'list, new, show, create, edit, update, delete, logout, disable, enable',

    )
);


\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
    'Infochy.' . $_EXTKEY,
    'PluginmydataPublic',
    array(
        'MyData' => 'listPublic, showPublic',

    ),
    // non-cacheable actions
    array(
        'MyData' => 'listPublic, showPublic',

    )
);
\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerTypeConverter('Infochy\\InfochyFeeditexample\\Property\\TypeConverter\\MyDataHiddenRecordsObjectConverter');

