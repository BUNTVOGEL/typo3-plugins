<?php
namespace Infochy\InfochyHelper\ViewHelpers;

/*                                                                        *
 * This script is part of the TYPO3 project - inspiring people to share!  *
 *                                                                        *
 * TYPO3 is free software; you can redistribute it and/or modify it under *
 * the terms of the GNU General Public License version 2 as published by  *
 * the Free Software Foundation.                                          *
 *                                                                        *
 * This script is distributed in the hope that it will be useful, but     *
 * WITHOUT ANY WARRANTY; without even the implied warranty of MERCHAN-    *
 * TABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General      *
 * Public License for more details.                                       *
 *                                                                        */


class TranslateFormErrorViewHelper extends \TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper
{

    /**
     * Initializes arguments for Translate ViewHelper Typo3 6. LTS
     *
     * @return void
     */
    public function initializeArguments()
    {
        $this->registerArgument('key', 'string', 'Translation Key');
        $this->registerArgument('id', 'string', 'Translation Key compatible to TYPO3 Flow');
        $this->registerArgument('default', 'string', 'if the given locallang key could not be found, this value is used. If this argument is not set, child nodes will be used to render the default');
        $this->registerArgument('htmlEscape', 'boolean', 'TRUE if the result should be htmlescaped. This won\'t have an effect for the default value');
        $this->registerArgument('arguments', 'array', 'Arguments to be replaced in the resulting string');
        $this->registerArgument('extensionName', 'string', 'UpperCamelCased extension key (for example BlogExample)');
    }

    /**
     * Wrapper function including a compatibility layer for TYPO3 Flow Translation
     *
     * @throws \TYPO3\CMS\Fluid\Core\ViewHelper\Exception\InvalidVariableException
     * @param boolean $debug enable debugger
     * @return string The translated key or tag body if key doesn't exist
     */
    public function render($debug = FALSE)
    {
        $id = $this->hasArgument('id') ? $this->arguments['id'] : $this->arguments['key'];
        $id = strtolower(str_replace('new', '', $id));
        $output = $this->arguments['default'];
        if (strlen($id) > 0) {
            $outputNew = $this->renderTranslation($id);
            if (strlen($outputNew)) {
                $output = $outputNew;
            }
        } else {
            throw new \TYPO3\CMS\Fluid\Core\ViewHelper\Exception\InvalidVariableException('An argument "key" or "id" has to be provided', 1351584844);
        }

        if ($debug) {
            $output = $output . '<span style="color:red">#
			&lt;h:TranslateFormError debug=&quot;<strong>1</strong>&quot;#set#locallang.xlf<br>
			&lt;trans-unit id=&quot;<strong>' . $id . '</strong>&quot;&gt;</span> ';
        }

        return $output;
    }

    /**
     * Translate a given key or use the tag body as default.
     *
     * @param string $id The locallang id
     * @return string The translated key or tag body if key doesn't exist
     */
    protected function renderTranslation($id)
    {
        $request = $this->controllerContext->getRequest();
        $extensionName = $this->arguments['extensionName'] === NULL ? $request->getControllerExtensionName() : $this->arguments['extensionName'];
        $value = \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate($id, $extensionName, $this->arguments['arguments']);
        if ($value === NULL) {
            $value = $this->arguments['default'] !== NULL ? $this->arguments['default'] : $this->renderChildren();
            if (is_array($this->arguments['arguments'])) {
                $value = vsprintf($value, $this->arguments['arguments']);
            }
        } elseif ($this->arguments['htmlEscape']) {
            $value = htmlspecialchars($value);
        }
        return $value;
    }
}
