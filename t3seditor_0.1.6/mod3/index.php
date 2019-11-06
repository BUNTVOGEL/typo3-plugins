<?php
/***************************************************************
*  Copyright notice
*
*  (c) 2007 Micha Barthel <infochy@web.de>
*  All rights reserved
*
*  This script is part of the TYPO3 project. The TYPO3 project is
*  free software; you can redistribute it and/or modify
*  it under the terms of the GNU General Public License as published by
*  the Free Software Foundation; either version 2 of the License, or
*  (at your option) any later version.
*
*  The GNU General Public License can be found at
*  http://www.gnu.org/copyleft/gpl.html.
*
*  This script is distributed in the hope that it will be useful,
*  but WITHOUT ANY WARRANTY; without even the implied warranty of
*  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
*  GNU General Public License for more details.
*
*  This copyright notice MUST APPEAR in all copies of the script!
***************************************************************/


	// DEFAULT initialization of a module [BEGIN]
unset($MCONF);
require ("conf.php");
require ($BACK_PATH."init.php");
require_once (t3lib_extMgm::extPath("t3quixplorer")."mod1/t3quixplorer_div.php");
unset($MCONF);
require ("conf.php");
require ($BACK_PATH."template.php");
require_once (t3lib_extMgm::extPath("t3seditor")."class.t3quixplorer.php");

$LANG->includeLLFile('EXT:t3quixplorer/mod1/locallang.xml');
$BE_USER->modAccess($MCONF,1);	// This checks permissions and exits if the users has no permission for entry.
	// DEFAULT initialization of a module [END]







if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/t3seditor/mod3/index.php'])	{
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/t3seditor/mod3/index.php']);
}




// Make instance:
$SOBE = t3lib_div::makeInstance('t3quixplorer');
$SOBE->init();

// Include files?
foreach($SOBE->include_once as $INC_FILE)	include_once($INC_FILE);
$SOBE->setT3SExtension();
$SOBE->setT3SFolder('configlibrary/tspage');
$SOBE->setT3STitle('Editor: TSconfig-Page');
$SOBE->main();
$SOBE->printContent();

?>