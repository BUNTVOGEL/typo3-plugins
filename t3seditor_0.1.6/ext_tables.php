<?php
if (!defined ('TYPO3_MODE')) 	die ('Access denied.');

if (TYPO3_MODE == 'BE')	{

	t3lib_extMgm::addModule('txt3seditorM1','','top',t3lib_extMgm::extPath($_EXTKEY).'mod1/');
}


if (TYPO3_MODE == 'BE')	{

	t3lib_extMgm::addModule('txt3seditorM1','txt3seditorM2','',t3lib_extMgm::extPath($_EXTKEY).'mod2/');
}


if (TYPO3_MODE == 'BE')	{

	t3lib_extMgm::addModule('txt3seditorM1','txt3seditorM3','',t3lib_extMgm::extPath($_EXTKEY).'mod3/');
}


if (TYPO3_MODE == 'BE')	{

	t3lib_extMgm::addModule('txt3seditorM1','txt3seditorM4','',t3lib_extMgm::extPath($_EXTKEY).'mod4/');
}


if (TYPO3_MODE == 'BE')	{

	t3lib_extMgm::addModule('txt3seditorM1','txt3seditorM5','',t3lib_extMgm::extPath($_EXTKEY).'mod5/');
}

if (TYPO3_MODE == 'BE')	{

	t3lib_extMgm::addModule('txt3seditorM1','txt3seditorM6','',t3lib_extMgm::extPath($_EXTKEY).'mod6/');
}
?>