<?php
namespace Infochy\InfochyCache\Controller;

/***************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2017 Micha Barthel <mb@infochy.de>, infochy
 *  Exampel From http://lbrmedia.net/codebase/Eintrag/extbase-6-eigenen-cache-in-extension-verwenden/
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
 * FluidController
 */
class FluidController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{

    /**
     * dataRepository
     *
     * @var \Infochy\InfochyCache\Domain\Repository\DataRepository
     * @inject
     */
    protected $dataRepository = NULL;
    


    /**
     * action show
     *
     * @return void
     */
    public function fluidAction() {

        $dataUid = intval(1); // Make a record with Uid 1

        $cacheIdentifier = $this->calculateCacheIdentifier(array(
            $GLOBALS["TSFE"]->sys_language_uid, // cache depends on the language
            $GLOBALS["TSFE"]->fe_user->groupData['uid'], // cache depends on the userGroup
            $dataUid, // cache depends on the object to show
        ));

        // instantiate the cache
        $cache =  \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('TYPO3\\CMS\\Core\\Cache\\CacheManager')->getCache('infochycache_cache');
        // try to find the cached content
        if (($content = $cache->get($cacheIdentifier)) === false) { // the cached content is NOT available
            // generate the content
            $content = $this->getFluidActionContent($dataUid);
            // save content in cache
            $cache->set($cacheIdentifier, $content, array(
                "fluidAction_" . $dataUid
            ));
            return '->new [PUT to Cache]->'.$content;
        }

        return '->cache  [GET from Cache]->'.$content;
    }

    /**
     * Method to get the content for the FluidAction
     * @param \integer $itemUid
     * @return \string
     */
    public function getFluidActionContent($dataUid) {
        $data = $this->dataRepository->findByUid($dataUid);
        $this->view->assign('data', $data);
        return $this->view->render();
    }

    /**
     * Calculates the cache identifier
     * @param \array $arr
     * @return \string
     */
    public static function calculateCacheIdentifier($arr) {
        return sha1(json_encode($arr)); // in average json_encode is four times faster than serialize()
    }

}
