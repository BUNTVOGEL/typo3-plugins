<?php
tx_div::load('tx_sblanguageswitcher_library_parse');
class tx_sblanguageswitcher_library_validate extends tx_sblanguageswitcher_library_parse{
	function isSelectAble($query) {
		$res = $GLOBALS['TYPO3_DB']->exec_SELECTquery($query['select'], $query['table'], $query['where'], $query['groupBy'], $query['orderBy'], $query['limit']);
		$rows = array ();
		while ($row = $GLOBALS['TYPO3_DB']->sql_fetch_assoc($res)) {
			$rows[] = $row;
		}
		$GLOBALS['TYPO3_DB']->sql_free_result($res);
		return (boolean) count($rows);
	}
	function isValidDate($day,$month,$year,$maxOld) {
		$day = (int) $day;
		$month = (int) $month;
		$year = (int) $year;
		if (($day < 1 || $day > 31) || ($month < 1 || $month > 12) || ($year < 1890 || $year > ((int) date('Y') - $maxOld))) {
			return false;
		}else{
		 	return true;
		}
	}
	function isValidStr($value, $maxSize) {
		$this->parseStr($value, $maxSize);
		if (strlen($value) > $maxSize || strlen($value) == 0) {
			return false;
		}else{
			return true;
		}
	}
	function isValidNumber($value, $minSize, $maxSize) {
		$in = $value;
		if (trim($value) == '') {
			$in = $minSize -10;
		}
		if ($in > $maxSize || $in < $minSize) {
			return false;
		}else{
			return true;
		}
	}
	function isValidEmail($value) {
		if (!preg_match("/^[^@\s]+@([-a-z0-9]+\.)+[a-z]{2,}$/i",$value)) {
			return false;
		}else{
			return true;
		}
	}
}
if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/sb_languageswitcher/library/class.tx_sblanguageswitcher_library_validate.php'])	{
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/sb_languageswitcher/library/class.tx_sblanguageswitcher_library_validate.php']);
}
?>
