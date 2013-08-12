<?php

/**
 * Default error controller
 *
 * @category Application
 * @package Application_Default
 * @subpackage Controllers
 * @author Vadim Leontiev <vadim.leontiev@gmail.com>
 * @see https://github.com/newage/clean-zfext
 * @since php 5.1 or higher
 */
class DebugController extends Zend_Controller_Action
{

    public function cleanoutAction()
    {
        $cacheName = $this->getRequest()->getParam('cache');

        if (empty($cacheName)) {
            throw new Core_Exception('Don\'t request cache name!');
        }

        $managerName = 'Zend_Cache_Manager';
        if (Zend_Registry::isRegistered($managerName) === false) {
            throw new Core_Exception('message', 'Don\'t register cache manager!');
        }

        $cacheManager = Zend_Registry::get($managerName);
        if ($cacheManager->hasCache($cacheName)) {
            $cache = $cacheManager->getCache($cacheName);
            $cache->clean(Zend_Cache::CLEANING_MODE_ALL);
            $this->view->assign('message', 'Cache with name "' . $cacheName . '" is cleaned!');
        } else {
            throw new Core_Exception('message', 'Don\'t register cache: ' . $cacheName);
        }
    }
}
