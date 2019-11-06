<?php

use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

class DomainModelImage extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{


    /**
     * Image
     *
     * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
     */
    protected $image;


    /**
     * Returns the image
     *
     * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference $image
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Sets the image
     *
     * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $image
     * @return void
     */
    public function setImage($image = null)
    {
        $this->image = $image;
    }

}
