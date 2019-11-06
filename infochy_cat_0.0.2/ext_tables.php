<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	'Infochy.' . $_EXTKEY,
	'Plugin',
	'Plugin Extbase Category Example '
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'Extbase Category Example');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_infochycat_domain_model_cat', 'EXT:infochy_cat/Resources/Private/Language/locallang_csh_tx_infochycat_domain_model_cat.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_infochycat_domain_model_cat');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::makeCategorizable(
    $_EXTKEY,
    'tx_infochycat_domain_model_cat',

    // optional: in case the field would need a different name as "categories".
    // The field is mandatory for TCEmain to work internally.
    $fieldName = 'categories',

    // optional: add TCA options which controls how the field is displayed. e.g position and name of the category tree.
    $options = array()
);
