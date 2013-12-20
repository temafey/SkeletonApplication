<?php
/**
 * @namespace
 */
namespace Core\Controller;

/**
 * Class ErrorController
 * @package Core\Controller
 */
class ErrorController extends \Core\Controller\Base
{
    /**
     * Initializes the controller
     */
    public function initialize()
    {
        parent::initialize();
        $this->view->setViewsDir($this->defualtModuleDir.'/View/');
    }

    public function show404Action()
    {
        $this->response->setStatusCode('404','Page not found');
    }

    public function show503Action()
    {
        $this->response->setStatusCode('503','Page not found');
    }
}

