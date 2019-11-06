<?php

class tx_sblanguageswitcher_library_parse{
	function parseStr($str, $size) {
		return (string) substr(trim(preg_replace("'<script[^>]*?>.*?</script>'si", "", stripslashes(htmlentities((string) $str, ENT_QUOTES)))), 0, $size);
	}
	function parseDateToString($day,$month,$year){
		$day = (int) $day;
		$month = (int) $month;
		$year = (int) $year;
		return $day . '-' . $month . '-' . $year;
	}
}
if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/sb_languageswitcher/library/class.tx_sblanguageswitcher_library_parse.php'])	{
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/sb_languageswitcher/library/class.tx_sblanguageswitcher_library_parse.php']);
}
?>
