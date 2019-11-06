<?php
namespace Infochy\Superfasttypo3\Controller;


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
 * SuperFastTypo3Controller
 */
class SuperFastTypo3Controller extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{
    protected function debug($mixedValue)
    {
        \TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($mixedValue);
    }

    /**
     * superFastTypo3Repository
     *
     * @var \Infochy\Superfasttypo3\Domain\Repository\SuperFastTypo3Repository
     * @inject
     */
    protected $superFastTypo3Repository = NULL;

    protected function getDirPath($folder)
    {
        $root = str_replace('/typo3/index.php', '', $_SERVER['SCRIPT_FILENAME']);
        return $root . $folder;
    }

    /**
     * action list
     *
     * @return void
     */
    public function listAction()
    {
        $activatedSFT = false;
        if (file_exists($this->getDirPath('/old_index.php'))) {
            $activatedSFT = true;
        }
        $notInstalled = null;
        if (!is_dir($this->getDirPath('/superfasttypo3/'))) {
            $notInstalled = true;
        }
        $superFastTypo3s = $this->superFastTypo3Repository->findAll();
        $this->view->assign('superFastTypo3s', $superFastTypo3s);
        $this->view->assign('notInstalled', $notInstalled);
        $this->view->assign('activatedSFT', $activatedSFT);
        $this->view->assign('compressionLevel', $GLOBALS['TYPO3_CONF_VARS']['FE']['compressionLevel']);
    }

    /**
     * action show
     *
     * @return void
     */
    public function showAction()
    {
        $superFastTypo3 = $this->superFastTypo3Repository->getModelRequest();
        $this->view->assign('superFastTypo3', $superFastTypo3);
    }

    /**
     * action zip
     *
     * @return void
     */
    public function zipAction()
    {
        $pathname = $_GET['tx_superfasttypo3_tools_superfasttypo3superfasttypo3']['superFastTypo3'];
        $this->zipFolderSend($this->getDirPath('/superfasttypo3/') . $pathname, $pathname);
    }

    public function zipFolderSend($nameDir, $namePlugin)
    {
        $filepath = $this->getDirPath('/superfasttypo3/') . $namePlugin . '.zip';
        @unlink($filepath);
        $rootPath = realpath($nameDir);
        $zip = new \ZipArchive();
        $zip->open($nameDir . '.zip', \ZipArchive::CREATE | \ZipArchive::OVERWRITE);

        $files = new \RecursiveIteratorIterator(
            new \RecursiveDirectoryIterator($rootPath),
            \RecursiveIteratorIterator::LEAVES_ONLY
        );

        foreach ($files as $name => $file) {
            if (!$file->isDir()) {
                $filePath = $file->getRealPath();
                $relativePath = substr($filePath, strlen($rootPath) + 1);
                $zip->addFile($filePath, $relativePath);
            }
        }
        $zip->close();

        header('Content-Type: application/zip');
        header('Content-Disposition: attachment; filename="' . $namePlugin . '.zip"');
        header('Content-Length: ' . filesize($filepath));
        readfile($filepath);
        unlink($filepath);
    }

    /**
     * action uploadzip
     *
     * @return void
     */
    public function uploadzipAction()
    {
        $file = $_FILES['tx_superfasttypo3_tools_superfasttypo3superfasttypo3'];
        $type = $file['type']['zipfile'];
        $name = $file['name']['zipfile'];
        $tmp_name = $file['tmp_name']['zipfile'];
        if ($type == 'application/zip') {
            $folderName = str_replace('.zip', '', $name);
            $zipPath = $this->getDirPath('/superfasttypo3/') . $name;
            $zipDest = $this->getDirPath('/superfasttypo3/') . $folderName;
            @unlink($zipPath);
            if (is_dir($zipDest)) {
                rename($zipDest, $this->getDirPath('/superfasttypo3/') . 'delete.' . time() . '.' . $folderName);
            }
            move_uploaded_file($tmp_name, $this->getDirPath('/superfasttypo3/') . $name);
            $this->unzip($zipPath, $zipDest);
            unlink($zipPath);
        }
        $this->redirect('list');
    }

    public function unzip($zipPath, $zipDest)
    {
        $zip = new \ZipArchive;
        if ($zip->open($zipPath) === TRUE) {
            $zip->extractTo($zipDest);
            $zip->close();
        }
    }

    /**
     * action upload
     *
     * @return void
     */
    public function uploadAction()
    {
    }

    /**
     * action deactivate
     *
     * @return void
     */
    public function deactivateAction()
    {

        rename($this->getDirPath('/index.php'), $this->getDirPath('/delete.' . time() . '.index.php'));
        rename($this->getDirPath('/old_index.php'), $this->getDirPath('/index.php'));
        $this->redirect('list');
    }

    /**
     * action activate
     *
     * @return void
     */
    public function activateAction()
    {

        rename($this->getDirPath('/index.php'), $this->getDirPath('/old_index.php'));
        @copy($this->getDirPath('/superfasttypo3/the_new_typo3_index.php'), $this->getDirPath('/index.php'));
        $this->redirect('list');
    }

    /**
     * action install
     *
     * @return void
     */
    public function installAction()
    {
        if (!is_writable('../index.php')) {
            $is_writable = 'Not writable index.php';
        }
        $this->view->assign('is_writable', $is_writable);
    }

    /**
     * action runinstaller
     *
     * @return void
     */
    public function runinstallerAction()
    {
        $src = $this->getDirPath('/typo3conf/ext/superfasttypo3/install/superfasttypo3/');
        $dst = $this->getDirPath('/superfasttypo3/');
        if (!is_dir($dst)) {
            $this->superFastTypo3Repository->rcopy($src, $dst);
        }
        #rename('../index.php','../old_index.php');
        #@copy('../superfasttypo3/the_new_typo3_index.php', '../index.php');
        $this->redirect('list');
    }

    /**
     * action new
     *
     * @return void
     */
    public function newAction()
    {
        $superFastTypo3s = $this->superFastTypo3Repository->findAll();
        $options = array();
        foreach ($superFastTypo3s as $obj) {
            $options[$obj->getUid()] = $obj->getUid();
        }
        $this->view->assign('options', $options);
    }

    /**
     * action create
     *
     * @return void
     */
    public function createAction()
    {
        $superFastTypo3 = $this->superFastTypo3Repository->getModelRequest();
        $this->redirect('list');
    }

    /**
     * action edit
     *
     * @return void
     */
    public function editAction()
    {
        $superFastTypo3 = $this->superFastTypo3Repository->getModelRequest();
        $is_writable = null;
        $filePath = $this->getDirPath('/superfasttypo3/') . $superFastTypo3->getUid() . '/index.php';
        if (!is_writable($filePath)) {
            $is_writable = 'Not writable!';
        }
        $this->view->assign('is_writable', $is_writable);
        $this->view->assign('superFastTypo3', $superFastTypo3);
    }

    /**
     * action update
     *
     * @return void
     */
    public function updateAction()
    {
        $superFastTypo3 = $this->superFastTypo3Repository->getModelRequest();
        $this->redirect('list');
    }

    /**
     * action status
     *
     * @return void
     */
    public function statusAction()
    {
        $superFastTypo3 = $this->superFastTypo3Repository->getModelRequest();
        $this->redirect('list');
    }

    /**
     * action delete
     *
     * @return void
     */
    public function deleteAction()
    {
        $superFastTypo3 = $this->superFastTypo3Repository->getModelRequest();
        $this->redirect('list');
    }

}
