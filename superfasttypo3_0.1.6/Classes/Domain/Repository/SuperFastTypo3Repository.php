<?php
namespace Infochy\Superfasttypo3\Domain\Repository;


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
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

/**
 * The repository for SuperFastTypo3s
 */
class SuperFastTypo3Repository extends \TYPO3\CMS\Extbase\Persistence\Repository
{
    protected function rrmdir($dir)
    {
        if (is_dir($dir)) {
            $files = scandir($dir);
            foreach ($files as $file)
                if ($file != "." && $file != "..") $this->rrmdir("$dir/$file");
            $this->rmdir($dir);
        } else if (file_exists($dir)) unlink($dir);
    }

    public function rcopy($src, $dst)
    {
        if (file_exists($dst)) $this->rrmdir($dst);
        if (is_dir($src)) {
            mkdir($dst);
            $files = scandir($src);
            foreach ($files as $file)
                if ($file != "." && $file != "..") $this->rcopy("$src/$file", "$dst/$file");
        } else if (file_exists($src)) copy($src, $dst);
    }

    protected function addModel($request)
    {
        $copyPath = $this->getDirPath('/superfasttypo3/') . $request['uid'];
        $newPath = $this->getDirPath('/superfasttypo3/') . 'activ.' . trim($request['title']) . '.0.0.1';
        if (!is_dir($newPath)) {
            $this->rcopy($copyPath, $newPath);
            $explode = explode('.', $request['uid']);
            $indexPHP = file_get_contents($newPath . '/index.php');
            $indexPHP = str_replace('superfasttypo3_' . $explode[1], 'superfasttypo3_' . trim($request['title']), $indexPHP);
            file_put_contents($newPath . '/index.php', $indexPHP);
        }
    }

    protected function updateModelIndex($request)
    {
        $pathname = $request['__identity'];
        $indexPHP = $request['index'];
        $indexPHP = html_entity_decode($indexPHP, ENT_QUOTES, 'UTF-8');
        $filePath = $this->getDirPath('/superfasttypo3/') . $pathname . '/index.php';
        if (file_exists($filePath)) {
            chmod($this->getDirPath('/superfasttypo3/') . $pathname, 0777);
            file_put_contents($filePath, $indexPHP);
        }
        return null;
    }

    protected function updateModelStatus($request)
    {
        $pathname = $request;
        $pathnameOld = $this->getDirPath('/superfasttypo3/') . $request . '';
        $explode = explode('.', $request);
        if (trim($explode[0]) == 'deactiv') {
            $pathnameNew = $this->getDirPath('/superfasttypo3/') . 'activ.' . $explode[1] . '.' . $explode[2] . '.' . $explode[3] . '.' . $explode[4];
            rename($pathnameOld, $pathnameNew);
        } else {
            $pathnameNew = $this->getDirPath('/superfasttypo3/') . 'deactiv.' . $explode[1] . '.' . $explode[2] . '.' . $explode[3] . '.' . $explode[4];
            rename($pathnameOld, $pathnameNew);
        }
        return null;
    }

    protected function removeModel($request)
    {
        $pathname = $request;
        $pathnameOld = $this->getDirPath('/superfasttypo3/') . $request . '';
        $explode = explode('.', $request);
        $pathnameNew = $this->getDirPath('/superfasttypo3/') . 'delete.' . time() . '.' . $explode[1] . '.' . $explode[2] . '.' . $explode[3] . '.' . $explode[4];
        rename($pathnameOld, $pathnameNew);
        return null;
    }

    public function findAll()
    {
        return $this->scandirSuperfasttypo3Dir();
    }

    protected function debug($mixedValue)
    {
        \TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($mixedValue);
    }

    protected function getModel($pathname)
    {
        $this->objectManager = new \TYPO3\CMS\Extbase\Object\ObjectManager();
        $SuperFastTypo3 = $this->objectManager->get('Infochy\Superfasttypo3\Domain\Model\SuperFastTypo3');
        $explode = explode('.', $pathname);
        $SuperFastTypo3->setUid($pathname);
        $SuperFastTypo3->setStatus(trim($explode[0]));
        $SuperFastTypo3->setTitle(trim($explode[1]));
        $SuperFastTypo3->setVersion(trim(@$explode[2]) . '.' . trim(@$explode[3]) . '.' . trim(@$explode[4]));
        $indexPHP = file_get_contents($this->getDirPath('/superfasttypo3/') . $pathname . '/index.php');
        $SuperFastTypo3->setIndex($indexPHP);
        $readme = file_get_contents($this->getDirPath('/superfasttypo3/') . $pathname . '/README.md');
        $SuperFastTypo3->setReadme($readme);
        return $SuperFastTypo3;
    }

    public function getModelRequest()
    {
        if (isset($_POST['tx_superfasttypo3_tools_superfasttypo3superfasttypo3']['newSuperFastTypo3'])) {
            $pathname = $_POST['tx_superfasttypo3_tools_superfasttypo3superfasttypo3']['newSuperFastTypo3'];
            return $this->addModel($pathname);
        }
        if (isset($_POST['tx_superfasttypo3_tools_superfasttypo3superfasttypo3']['superFastTypo3'])) {
            $request = $_POST['tx_superfasttypo3_tools_superfasttypo3superfasttypo3']['superFastTypo3'];
            $action = $_POST['tx_superfasttypo3_tools_superfasttypo3superfasttypo3']['__referrer']['@action'];
            if ($action == 'edit') {
                return $this->updateModelIndex($request);
            }
        }
        if (isset($_GET['tx_superfasttypo3_tools_superfasttypo3superfasttypo3']['superFastTypo3'])) {
            $request = $_GET['tx_superfasttypo3_tools_superfasttypo3superfasttypo3']['superFastTypo3'];
            $action = $_GET['tx_superfasttypo3_tools_superfasttypo3superfasttypo3']['action'];
            if ($action == 'status') {
                return $this->updateModelStatus($request);
            }
            if ($action == 'delete') {
                return $this->removeModel($request);
            }
            $pathname = $_GET['tx_superfasttypo3_tools_superfasttypo3superfasttypo3']['superFastTypo3'];
            return $this->getModel($pathname);
        }
        return null;
    }

    protected function createObjectStorage()
    {
        $this->objectManager = new \TYPO3\CMS\Extbase\Object\ObjectManager();
        return $this->objectManager->get('TYPO3\CMS\Extbase\Persistence\ObjectStorage');
    }

    protected function getDirPath($folder)
    {
        $root = str_replace('/typo3/index.php', '', $_SERVER['SCRIPT_FILENAME']);
        return $root . $folder;
    }

    protected function scandirSuperfasttypo3Dir()
    {
        $superfasttypo3Dir = array();
        $superfasttypo3Dir = $this->createObjectStorage();
        $superfasttypo3Plugins = @scandir($this->getDirPath('/superfasttypo3'));

        foreach ((array)$superfasttypo3Plugins as $pathname) {
            if (is_dir($this->getDirPath('/superfasttypo3/') . $pathname) && $pathname != '..' && $pathname != '.') {
                $explode = explode('.', $pathname);
                if ((trim($explode[0]) == 'activ' OR trim($explode[0]) == 'deactiv') && count($explode) == 5) {
                    $superfasttypo3Dir->attach($this->getModel($pathname));
                }
            }
        }
        return $superfasttypo3Dir;
    }
}
