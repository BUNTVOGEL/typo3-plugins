<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'Infochy.' . $_EXTKEY,
	'Fluid',
	array(
		'Fluid' => 'fluid',
		
	),
	// non-cacheable actions
	array(
		'Fluid' => 'fluid',
		
	)
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'Infochy.' . $_EXTKEY,
	'Model',
	array(
		'Model' => 'model',
		
	),
	// non-cacheable actions
	array(
		'Model' => 'model',
		
	)
);

/**
 * register cache for extension
 */
if (!is_array($TYPO3_CONF_VARS['SYS']['caching']['cacheConfigurations']['infochycache_cache'])) {
    $TYPO3_CONF_VARS['SYS']['caching']['cacheConfigurations']['infochycache_cache'] = array();
    $TYPO3_CONF_VARS['SYS']['caching']['cacheConfigurations']['infochycache_cache']['frontend'] = 'TYPO3\\CMS\\Core\\Cache\\Frontend\\VariableFrontend';
    $TYPO3_CONF_VARS['SYS']['caching']['cacheConfigurations']['infochycache_cache']['backend'] = 'TYPO3\\CMS\\Core\\Cache\\Backend\\Typo3DatabaseBackend';
    $TYPO3_CONF_VARS['SYS']['caching']['cacheConfigurations']['infochycache_cache']['options']['compression'] = 1;
}
