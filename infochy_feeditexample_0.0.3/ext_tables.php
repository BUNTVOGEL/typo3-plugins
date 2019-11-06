<?php
if (!defined('TYPO3_MODE')) {
    die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
    'Infochy.' . $_EXTKEY,
    'Pluginmydata',
    'Private Plugin - Extbase Example: FeEditing, FeUser-Access And FAL '
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
    'Infochy.' . $_EXTKEY,
    'PluginmydataPublic',
    'Public Plugin - Extbase Example: FeEditing, FeUser-Access And FAL '
);


#\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'Extbase Example: FeEditing, FeUser-Access And FAL');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_infochyfeeditexample_domain_model_mydata', 'EXT:infochy_feeditexample/Resources/Private/Language/locallang_csh_tx_infochyfeeditexample_domain_model_mydata.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_infochyfeeditexample_domain_model_mydata');
