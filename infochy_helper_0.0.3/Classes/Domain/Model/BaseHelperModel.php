<?php
namespace Infochy\InfochyHelper\Domain\Model;

/***************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2016
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

/**
 * BaseHelperModel
 */
class BaseHelperModel extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{
    /**
     * hidden
     *
     * @var boolean
     */
    protected $hidden = FALSE;

    /**
     * Returns hidden
     *
     * @return boolean $hidden
     */
    public function getHidden()
    {
        return $this->hidden;
    }


    /**
     * Sets hidden
     *
     * @param boolean $hidden
     * @return void
     */
    public function setHidden($hidden)
    {
        $this->hidden = $hidden;
    }


    /**
     * Returns the boolean state of hidden
     *
     * @return boolean
     */
    public function isHidden()
    {
        return $this->getHidden();
    }

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
