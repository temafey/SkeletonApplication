<?php
/**
 * @namespace
 */
namespace Extjs\Controller;

use Phalcon\Mvc\Controller as PhController,
    Phalcon\Mvc\View as PhView;

/**
 * Class Base
 * @package Extjs\Controller
 */
class Base extends PhController
{
    /**
     * Initializes the controller
     */
    public function initialize()
    {
        if ($this->config->application->debug && $this->di->has('profiler')) {
            $this->profiler->start();
        }

        $this->view->setRenderLevel(PhView::LEVEL_ACTION_VIEW);
        // run init function
        if (method_exists($this, 'init')) {
            $this->init();
        }

        //Add some local CSS resources
        $this->assets
            ->addCss('extjs/lib/resources/css/ext-all.css')
            ->addCss('extjs/apps/cms/style.css')
            ->addJs('extjs/lib/ext-all-debug.js');
            //->addJs('extjs/lib/ext-all-rtl-debug-w-comments.js');
    }

    public function afterExecuteRoute()
    {
        if ($this->config->application->debug && $this->di->has('profiler')) {
            $this->profiler->stop(get_called_class(), 'controller');
        }
    }

    public function disableHeader()
    {
        $this->view->disableHeader = true;
    }

    public function disableFooter()
    {
        $this->view->disableFooter = true;
    }

}