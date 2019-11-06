<?php

use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

class DomainModelFeUser extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{


    /**
     * user
     *
     * @var \TYPO3\CMS\Extbase\Domain\Model\FrontendUser
     */
    protected $user;

    /**
     * Returns the user
     *
     * @return \TYPO3\CMS\Extbase\Domain\Model\FrontendUser $user
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Sets the user
     *
     * @param \TYPO3\CMS\Extbase\Domain\Model\FrontendUser $user
     * @return void
     */
    public function setUser($user)
    {
        $this->user = $user;
    }


}
