<?php

use TYPO3\CMS\Extbase\Persistence\ObjectStorage;


class DomainModelImageCollection extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{
    /**
     * Image
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference>
     */
    protected $imageCollection;

    public function __construct()
    {
        $this->imageCollection = new ObjectStorage();
    }

    /**
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $imageCollection
     */
    public function setImageCollection($imageCollection)
    {
        $this->imageCollection = $imageCollection;
    }

    /**
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
     */
    public function getImageCollection()
    {
        return $this->imageCollection;
    }
}
