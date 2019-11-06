<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	'Infochy.' . $_EXTKEY,
	'Plugin',
	'Plugin Extbase Fluid TypoScript Include Example'
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	'Infochy.' . $_EXTKEY,
	'Cobject',
	'Include via TypoScript -> Plugin Extbase Fluid cobject Example'
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'Extbase cobject Plugin in Fluid Example');

