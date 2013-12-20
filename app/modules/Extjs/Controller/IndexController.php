<?php
/**
 * @namespace
 */
namespace Extjs\Controller;

/**
 * @RoutePrefix("/admin", name="home")
 */
class IndexController extends Base
{
    /**
     * @Route("/", methods={"GET"}, name="home")
     */
    public function indexAction()
    {
        $params = $this->request->getQuery();

        $grid = new \Event\Grid\Extjs\Events($params);
        $data = $grid->render();
        //var_dump($data);die;
        $this->view->title = $grid->getTitle();
        $this->view->grid = $data;
        $this->view->pick('grid/grid');
    }

    /**
     * @Route("/{crudModule:[a-z]+}/{crudGrid:[a-z]+}/read", methods={"GET", "POST"}, name="grid-read")
     */
    public function readAction($module, $grid)
    {
        $params = $this->request->getQuery();
        $params2 =$this->dispatcher->getParams();
        $grid = new \Event\Grid\Extjs\Events($params);
        echo $grid->getData();
        die;
    }

}

