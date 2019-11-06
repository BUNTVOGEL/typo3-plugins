<?php
tx_div::load('tx_lib_link');
class tx_sblanguageswitcher_library_link extends tx_lib_link{
	var $parametersSpecial = array();		      // parameters of the link
	/**
	 * Set array of new parameters to add to the link url
	 *
	 * The parameters will create a common array with the name $this->designatorString.
	 * Example: &tx_example[parameterName]=parameterValue
	 * tx_example is the designator, parameterName is the key,
	 * pararmeterValue is the value of one array element.
	 *
	 * This parameters overrule parameters in $this->baseParameters.
	 *
	 * @param	  mixed		parameters
	 * @return	void
	 */
	function parametersSpecial($parametersSpecial = array()){
		if(is_object($parametersSpecial)) {
			$parametersSpecial = $parametersSpecial->getArrayCopy();
		}
		$this->parametersSpecial = $parametersSpecial;
		return $this;
	}
	function _makeConfig($type){
		$conf = Array();
		$this->parameters = is_array($this->parameters) ?
			$this->parameters : array();
		$this->overruledParameters = is_array($this->overruledParameters) ?
			$this->overruledParameters : array();
		unset($this->overruledParameters['DATA']);
		$parameters
			= t3lib_div::array_merge_recursive_overrule($this->overruledParameters,
					$this->parameters);
		foreach((array) $parameters as $key => $value){
			if(!is_array($value)) {   // TODO handle arrays
				if($this->designatorString) {
					$conf['additionalParams'] .= '&' . $this->designatorString . '['
						. rawurlencode($key) . ']=' . rawurlencode($value);
				} else {
					$conf['additionalParams'] .= '&' .
						rawurlencode($key) . '=' . rawurlencode($value);
				}
			}
		}
		/// parametersSpecial
		$this->parametersSpecial = is_array($this->parametersSpecial) ?
			$this->parametersSpecial : array();
		foreach((array) $this->parametersSpecial as $key => $value){
			if(!is_array($value)) {   // TODO handle arrays
					$conf['additionalParams'] .= '&' .
						rawurlencode($key) . '=' . rawurlencode($value);
			}
		}
		/// parametersSpecial

		if($this->noHashBoolean ) {
			$conf['useCacheHash'] = 0;
		} else {
			$conf['useCacheHash'] = 1;
		}
		if($this->noCacheBoolean) {
			$conf['no_cache'] = 1;
			$conf['useCacheHash'] = 0;
		} else {
			$conf['no_cache'] = 0;
		}
		if($this->destination !== '')
			$conf['parameter'] = $this->destination;
		if($type == 'url') {
			$conf['returnLast'] = 'url';
		}
		if($this->anchorString){
			$conf['section'] = $this->anchorString;
		}
		if($this->targetString){
			$conf['target'] = $this->targetString;
		}
		if($this->externalTargetString){
			$conf['extTarget'] = $this->externalTargetString;
		}
		if($this->classString){
			$conf['ATagParams'] .= 'class="' . $this->classString . '" ';
		}
		if($this->idString){
			$conf['ATagParams'] .= 'id="' . $this->idString . '" ';
		}
		if($this->titleString){
			$title = ($this->titleHasAlreadyHtmlSpecialChars) ? $this->titleString
				: htmlspecialchars($this->titleString);
			$conf['ATagParams'] .= 'title="' . $title . '" ';
		}
		if(is_array($this->tagAttributes)
				&& (count($this->tagAttributes) > 0)) {
			foreach($this->tagAttributes as $key => $value) {
				$conf['ATagParams'] .= ' ' .  $key . '="' . htmlspecialchars($value) . '" ';
			}
		}
		return $conf;
	}
}
if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/sb_languageswitcher/library/class.tx_sblanguageswitcher_library_link.php'])	{
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/sb_languageswitcher/library/class.tx_sblanguageswitcher_library_link.php']);
}
?>
