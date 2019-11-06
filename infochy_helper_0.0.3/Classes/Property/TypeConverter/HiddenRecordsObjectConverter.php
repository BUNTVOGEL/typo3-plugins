<?php
namespace Infochy\InfochyHelper\Property\TypeConverter;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2014 Manuel Selbach <m.selbach@reply.de>, triplesense reply
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
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
use TYPO3\CMS\Extbase\Property\TypeConverter\PersistentObjectConverter;

class HiddenRecordsObjectConverter extends PersistentObjectConverter
{
    const IGNORE_ENABLE_FIELDS_NAME = 'IGNORE_ENABLE_FIELDS';
    const RESPECT_STORAGE_PAGE_NAME = 'RESPECT_STORAGE_PAGE';
    const RESPECT_SYS_LANGUAGE_NAME = 'RESPECT_SYS_LANGUAGE';
    /**
     * @var bool
     */
    protected $ignoreEnableFields = false;
    /**
     * @var bool
     */
    protected $respectStoragePage = true;

    /**
     * @var bool
     */
    protected $respectSysLanguage = true;
    /**
     * @var string
     */
    protected $targetType = '';

    /**
     * @var int
     */
    protected function debug($mixedValue)
    {
        \TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($mixedValue);
    }

    protected $priority = 2;

    /**
     * @param mixed $source
     * @param string $targetType
     * @param array $convertedChildProperties
     * @param \TYPO3\CMS\Extbase\Property\PropertyMappingConfigurationInterface $configuration
     * @return null|object
     * @throws \TYPO3\CMS\Extbase\Property\Exception\InvalidPropertyMappingConfigurationException
     * @throws \TYPO3\CMS\Extbase\Property\Exception\InvalidSourceException
     * @throws \TYPO3\CMS\Extbase\Property\Exception\InvalidTargetException
     * @throws \TYPO3\CMS\Extbase\Property\Exception\TargetNotFoundException
     */
    public function convertFrom($source, $targetType, array $convertedChildProperties = array(), \TYPO3\CMS\Extbase\Property\PropertyMappingConfigurationInterface $configuration = null)
    {
        $ignoreEnableFields = $configuration->getConfigurationValue(get_class($this), self::IGNORE_ENABLE_FIELDS_NAME);
        if (isset($ignoreEnableFields)) {
            $this->ignoreEnableFields = $ignoreEnableFields;
        }
        $respectStoragePage = $configuration->getConfigurationValue(get_class($this), self::RESPECT_STORAGE_PAGE_NAME);
        if (isset($respectStoragePage)) {
            $this->respectStoragePage = $respectStoragePage;
        }
        $respectSysLanguage = $configuration->getConfigurationValue(get_class($this), self::RESPECT_SYS_LANGUAGE_NAME);
        if (isset($respectSysLanguage)) {
            $this->respectSysLanguage = $respectSysLanguage;
        }

        if (is_array($source)) {
            if (
                class_exists($targetType)
                && is_subclass_of($targetType, 'TYPO3\\CMS\\Extbase\\DomainObject\\AbstractValueObject')
            ) {
                // Unset identity for valueobject to use constructor mapping, since the identity is determined from
                // constructor arguments
                unset($source['__identity']);
            }
            $object = $this->handleArrayData($source, $targetType, $convertedChildProperties, $configuration);
        } elseif (is_string($source) || is_int($source)) {
            if (empty($source)) {
                return null;
            }
            $object = $this->fetchObjectFromPersistence($source, $targetType);
        } else {
            throw new \InvalidArgumentException('Only integers, strings and arrays are accepted.', 1305630314);
        }
        foreach ($convertedChildProperties as $propertyName => $propertyValue) {
            $result = \TYPO3\CMS\Extbase\Reflection\ObjectAccess::setProperty($object, $propertyName, $propertyValue);
            if ($result === false) {
                $exceptionMessage = sprintf(
                    'Property "%s" having a value of type "%s" could not be set in target object of type "%s". Make sure that the property is accessible properly, for example via an appropriate setter method.',
                    $propertyName,
                    (is_object($propertyValue) ? get_class($propertyValue) : gettype($propertyValue)),
                    $targetType
                );
                throw new \TYPO3\CMS\Extbase\Property\Exception\InvalidTargetException($exceptionMessage, 1297935345);
            }
        }
        return $object;
    }

    /**
     * Fetch an object from persistence layer.
     *
     * @param mixed $identity
     * @param string $targetType
     * @throws \TYPO3\CMS\Extbase\Property\Exception\TargetNotFoundException
     * @throws \TYPO3\CMS\Extbase\Property\Exception\InvalidSourceException
     * @return object
     */
    protected function fetchObjectFromPersistence($identity, $targetType)
    {
        if (ctype_digit((string)$identity)) {
            $query = $this->persistenceManager->createQueryForType($targetType);
            $querySettings = $query->getQuerySettings();
            $querySettings->setIgnoreEnableFields($this->ignoreEnableFields);
            $querySettings->setRespectStoragePage($this->respectStoragePage);
            $querySettings->setRespectSysLanguage($this->respectSysLanguage);
            $query->setQuerySettings($querySettings);
            $constraints = $query->equals('uid', $identity);
            $object = $query->matching($constraints)->execute()->getFirst();
        } else {
            throw new \TYPO3\CMS\Extbase\Property\Exception\InvalidSourceException('The identity property "' . $identity . '" is no UID.', 1297931020);
        }
        if ($object === null) {
            throw new \TYPO3\CMS\Extbase\Property\Exception\TargetNotFoundException('Object with identity "' . print_r($identity, true) . '" not found.', 1297933823);
        }
        return $object;
    }
}
