<?php
namespace Infochy\Superfasttypo3\Domain\Model;


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
 * SuperFastTypo3
 */
class SuperFastTypo3 extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{
    /**
     * pid
     *
     * @var int
     */
    protected $pid = 0;
    /**
     * uid
     *
     * @var string
     */
    protected $uid = '';
    /**
     * status
     *
     * @var string
     */
    protected $status = '';
    /**
     * title
     *
     * @var string
     */
    protected $title = '';

    /**
     * version
     *
     * @var string
     */
    protected $version = '';

    /**
     * Returns the status
     *
     * @return string $status
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Sets the status
     *
     * @param string $status
     * @return void
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * Returns the uid
     *
     * @return string $uid
     */
    public function getUid()
    {
        return $this->uid;
    }

    /**
     * Sets the uid
     *
     * @param string $uid
     * @return void
     */
    public function setUid($uid)
    {
        $this->uid = $uid;
    }

    /**
     * Returns the pid
     *
     * @return int $pid
     */
    public function getPid()
    {
        return $this->pid;
    }

    /**
     * Sets the pid
     *
     * @param int $pid
     * @return void
     */
    public function setPid($pid)
    {
        $this->pid = $pid;
    }

    /**
     * Returns the title
     *
     * @return string $title
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Sets the title
     *
     * @param string $title
     * @return void
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * Returns the version
     *
     * @return string $version
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * Sets the version
     *
     * @param string $version
     * @return void
     */
    public function setVersion($version)
    {
        $this->version = $version;
    }

    /**
     * index
     *
     * @var string
     */
    protected $index = '';

    /**
     * Returns the index
     *
     * @return string $index
     */
    public function getIndex()
    {
        return $this->index;
    }

    /**
     * Sets the index
     *
     * @param string $index
     * @return void
     */
    public function setIndex($index)
    {
        $this->index = $index;
    }

    /**
     * readme
     *
     * @var string
     */
    protected $readme = '';

    /**
     * Returns the readme
     *
     * @return string $readme
     */
    public function getReadme()
    {
        return $this->readme;
    }

    /**
     * Sets the readme
     *
     * @param string $readme
     * @return void
     */
    public function setReadme($readme)
    {
        $this->readme = $readme;
    }

}
