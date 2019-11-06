<?
/***************************************************************
 *  Copyright notice
 *
 *  (c) 2006 Micha Barthel
 *  Contact: barthel@sunbeam-berlin.de
 *  All rights reserved
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 2.1 of the License, or (at your option) any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this library; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 ***************************************************************/
tx_div::load('tx_lib_object');
class tx_sblanguageswitcher_models_library  extends tx_lib_object{
  function getQuerySelection($querySelection){
	$res = $GLOBALS['TYPO3_DB']->exec_SELECTquery($querySelection['select'],
	                                              $querySelection['table'],
	                                              $querySelection['where'],
                                                  $querySelection['groupBy'],
                                                  $querySelection['orderBy'],
                                                  $querySelection['limit']);
	 while($assoc = $GLOBALS['TYPO3_DB']->sql_fetch_assoc($res)) {
		$rows[] = $assoc;
	}
	$GLOBALS['TYPO3_DB']->sql_free_result($res);
	return (array)$rows;
  }
	function insertRow($table, $insert) {
		return $GLOBALS['TYPO3_DB']->exec_INSERTquery($table, $insert);
	}
	function lastInsertRow() {
		return $GLOBALS['TYPO3_DB']->sql_insert_id();
	}
	function insertMM($table,$uid_foreign,$uid_local){
                    $insertMM = array(
                        'uid_foreign' => $uid_foreign,
                        'uid_local' => $uid_local
                      );
	        return $this->insertRow($table, $insertMM);
	}
	function isSelectAble($query) {
		$res = $GLOBALS['TYPO3_DB']->exec_SELECTquery($query['select'], $query['table'], $query['where'], $query['groupBy'], $query['orderBy'], $query['limit']);
		$rows = array ();
		while ($row = $GLOBALS['TYPO3_DB']->sql_fetch_assoc($res)) {
			$rows[] = $row;
		}
		$GLOBALS['TYPO3_DB']->sql_free_result($res);
		return (boolean) count($rows);
	}
  function isRecordSelectAble($recordTable,$uid,$sysLanguageUid){
  
	  if($sysLanguageUid>=1){
		  $where = ' l18n_parent='.$uid.' AND sys_language_uid='.$sysLanguageUid;
	  }else{
		  $where = ' uid='.$uid;
      }
	  $query['select'] = '*';
	  $query['table'] = $recordTable;
	  $query['where'] = ' NOT deleted AND NOT hidden AND '.$where;
	  $query['groupBy'] = '';
	  $query['orderBy'] = '';
	  $query['limit'] = '1';
	  return $this->isSelectAble($query);
  }
}
if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/sb_languageswitcher/models/library/class.tx_sblanguageswitcher_models_library.php'])	{
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/sb_languageswitcher/models/library/class.tx_sblanguageswitcher_models_library.php']);
}

?>
