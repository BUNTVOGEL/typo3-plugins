<?php
$TYPO3_CONF_VARS['SYS']['sitename'] = 'New TYPO3 site';

	// Default password is "joh316" :
$TYPO3_CONF_VARS['BE']['installToolPassword'] = 'bacb98acf97e0b6112b1d1b650b84971';

$TYPO3_CONF_VARS['EXT']['extList'] = 'tsconfig_help,context_help,extra_page_cm_options,impexp,sys_note,tstemplate,tstemplate_ceditor,tstemplate_info,tstemplate_objbrowser,tstemplate_analyzer,func_wizards,wizard_crpages,wizard_sortpages,lowlevel,install,belog,beuser,aboutmodules,setup,taskcenter,info_pagetsconfig,viewpage,rtehtmlarea,css_styled_content,t3skin';

$typo_db_extTableDef_script = 'extTables.php';

## INSTALL SCRIPT EDIT POINT TOKEN - all lines after this points may be changed by the install script!

$typo_db_username = 'dbuser7960';	//  Modified or inserted by TYPO3 Install Tool.
$typo_db_password = '8EcC0tcWn';	//  Modified or inserted by TYPO3 Install Tool.
$typo_db_host = 'localhost';	//  Modified or inserted by TYPO3 Install Tool.
$TYPO3_CONF_VARS['SYS']['encryptionKey'] = '9b1634e70334a5b0be7a24540251bc0d';	//  Modified or inserted by TYPO3 Install Tool.
$TYPO3_CONF_VARS['SYS']['compat_version'] = '4.1';	//  Modified or inserted by TYPO3 Install Tool.
$typo_db = 'db0026796';	//  Modified or inserted by TYPO3 Install Tool.
// Updated by TYPO3 Install Tool 27-03-07 14:00:02
$TYPO3_CONF_VARS['EXT']['extList'] = 'css_styled_content,tsconfig_help,context_help,extra_page_cm_options,impexp,sys_note,tstemplate,tstemplate_ceditor,tstemplate_info,tstemplate_objbrowser,tstemplate_analyzer,func_wizards,wizard_crpages,wizard_sortpages,lowlevel,install,belog,beuser,aboutmodules,setup,taskcenter,info_pagetsconfig,viewpage,rtehtmlarea,t3skin,phpmyadmin,t3s,chc_forum,tt_news,sk_pagecomments,pmktextarea,date2cal,metatags,indexed_search,kb_md5fepw,automaketemplate,jw_calendar,div,lib,newloginbox,realurl,dam,dam_index,dam_catedit,dam_downloadlist';	// Modified or inserted by TYPO3 Extension Manager. 
$TYPO3_CONF_VARS['EXT']['extConf']['dam'] = 'a:4:{s:8:"web_file";s:1:"0";s:15:"hideMediaFolder";s:1:"0";s:5:"devel";s:1:"0";s:5:"debug";s:1:"0";}';	// Modified or inserted by TYPO3 Extension Manager. 
$TYPO3_CONF_VARS['EXT']['extConf']['tt_news'] = 'a:14:{s:13:"useStoragePid";s:1:"1";s:13:"noTabDividers";s:1:"0";s:25:"l10n_mode_prefixLangTitle";s:1:"1";s:22:"l10n_mode_imageExclude";s:1:"1";s:20:"hideNewLocalizations";s:1:"0";s:13:"prependAtCopy";s:1:"1";s:5:"label";s:5:"title";s:9:"label_alt";s:0:"";s:10:"label_alt2";s:0:"";s:15:"label_alt_force";s:1:"0";s:11:"treeOrderBy";s:3:"uid";s:21:"categorySelectedWidth";s:1:"0";s:17:"categoryTreeWidth";s:1:"0";s:18:"categoryTreeHeigth";s:1:"5";}';	//  Modified or inserted by TYPO3 Extension Manager.
$TYPO3_CONF_VARS['EXT']['extConf']['pmktextarea'] = 'a:27:{s:12:"linenumState";s:1:"1";s:9:"wrapState";s:1:"1";s:11:"showButtons";s:1:"1";s:16:"showMinMaxButton";s:1:"1";s:14:"showWrapButton";s:1:"1";s:17:"showLinenumButton";s:1:"1";s:14:"showFindButton";s:1:"1";s:14:"showJumpButton";s:1:"1";s:15:"showFontButtons";s:1:"1";s:11:"typo3Colors";s:1:"1";s:15:"linenumColWidth";s:2:"47";s:15:"defaultFontSize";s:1:"9";s:13:"defaultHeight";s:1:"0";s:12:"defaultWidth";s:1:"0";s:9:"minHeight";s:1:"0";s:9:"maxHeight";s:1:"0";s:8:"minWidth";s:1:"0";s:8:"maxWidth";s:1:"0";s:5:"lockH";s:1:"0";s:5:"lockW";s:1:"0";s:9:"backColor";s:7:"#C8C8CD";s:11:"borderColor";s:7:"#808080";s:11:"backColorLn";s:7:"#F0F0F0";s:13:"borderColorLn";s:7:"#96969B";s:11:"textColorLn";s:7:"#808080";s:7:"tabChar";s:7:"Tabchar";s:10:"buttonPath";s:0:"";}';	//  Modified or inserted by TYPO3 Extension Manager.
$TYPO3_CONF_VARS['EXT']['extConf']['date2cal'] = 'a:3:{s:11:"calendarCSS";s:14:"aqua/theme.css";s:8:"datetime";s:1:"1";s:11:"calendarImg";s:0:"";}';	//  Modified or inserted by TYPO3 Extension Manager.
$TYPO3_CONF_VARS['EXT']['extConf']['dam_index'] = 'a:2:{s:18:"add_media_indexing";s:1:"0";s:23:"add_media_file_indexing";s:1:"1";}';	// Modified or inserted by TYPO3 Extension Manager. 
$TYPO3_CONF_VARS['EXT']['extConf']['indexed_search'] = 'a:17:{s:8:"pdftools";s:9:"/usr/bin/";s:8:"pdf_mode";s:2:"20";s:5:"unzip";s:9:"/usr/bin/";s:6:"catdoc";s:9:"/usr/bin/";s:6:"xlhtml";s:9:"/usr/bin/";s:7:"ppthtml";s:9:"/usr/bin/";s:5:"unrtf";s:9:"/usr/bin/";s:9:"debugMode";s:1:"0";s:18:"fullTextDataLength";s:1:"0";s:23:"disableFrontendIndexing";s:1:"0";s:6:"minAge";s:2:"24";s:6:"maxAge";s:1:"0";s:16:"maxExternalFiles";s:1:"5";s:26:"useCrawlerForExternalFiles";s:1:"0";s:11:"flagBitMask";s:3:"192";s:16:"ignoreExtensions";s:0:"";s:17:"indexExternalURLs";s:1:"0";}';	//  Modified or inserted by TYPO3 Extension Manager.
// Updated by TYPO3 Extension Manager 27-03-07 16:25:43
$TYPO3_CONF_VARS['BE']['installToolPassword'] = '8a67f3a243f80494d09c1b357a6e8801';	//  Modified or inserted by TYPO3 Install Tool.
// Updated by TYPO3 Install Tool 27-03-07 18:04:34
?>