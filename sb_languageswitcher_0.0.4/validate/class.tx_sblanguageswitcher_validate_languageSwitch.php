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
tx_div::load('tx_sblanguageswitcher_library_validate');
class tx_sblanguageswitcher_validate_languageSwitch extends tx_sblanguageswitcher_library_validate{
 var $validateData = array();
 function load($data,$conf){
    return  $this->buildLangGetArray($data,$conf);
 }
 function buildLangGetArray($data,$conf){
   $arr = array();
   foreach((array)$data as $key => $value){
      if(!in_array($key,explode(',',$conf['notInBuildArray']))){
         if(is_array($value)){
            foreach($value as $key1 => $value1){
               $arr[$key][$key1] = $this->parseStr($value1,$conf['parseStringLimit']);
            }
         }else{
            $arr[$key] = $this->parseStr($value,$conf['parseStringLimit']);
         }
      }
   }
   return $arr;
 }

}
if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/sb_languageswitcher/validate/class.tx_sblanguageswitcher_validate_languageSwitch.php'])	{
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/sb_languageswitcher/validate/class.tx_sblanguageswitcher_validate_languageSwitch.php']);
}

?>
