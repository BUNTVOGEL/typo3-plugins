<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'Infochy.' . $_EXTKEY,
	'Plugin',
	array(
		'Data' => 'list',
		
	),
	// non-cacheable actions
	array(
		'Data' => 'list',
		
	)
);
