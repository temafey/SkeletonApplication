<?php
/**
 * @namespace
 */
namespace Event\Controller;

/**
 * @RoutePrefix("/", name="home")
 */
class IndexController extends \Core\Controller\Base
{
    /**
     * @Route("/", methods={"GET"}, name="home")
     */
    public function indexAction()
    {
        $params = $this->request->getQuery();

        $grid = new \Event\Grid\Events($params);
        $data = $grid->render();
        $this->view->title = $grid->getTitle();
        $this->view->grid = $data;
        $this->view->pick('events/grid');
    }
}

