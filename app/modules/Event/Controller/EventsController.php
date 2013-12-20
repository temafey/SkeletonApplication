<?php
/**
 * @namespace
 */
namespace Event\Controller;

/**
 * @RoutePrefix("/event", name="event")
 * @Acl(actions={"index","create","edit","save","delete"}, options={"event_edit"})
 */
class EventsController extends \Core\Controller\Base
{
    /**
     * @Route("/", methods={"GET"}, name="event-index")
     */
    public function indexAction()
    {
        $params = $this->request->getQuery();
        $grid = new \Event\Grid\Events($params);
        $this->view->grid = $grid->render();
        $this->view->pick('events/grid');
    }

    /**
     * @Route("/create", methods={"GET"}, name="event-create")
     */
    public function createAction()
    {
        $form = new \Event\Form\Events();
        $form->initForm();
        $this->view->form = $form->render();
        $this->view->pick('events/form');
    }

    /**
     * @Get("/edit/{id:[0-9]+}", name="event-edit")
     */
    public function editAction($id)
    {
        $form = new \Event\Form\Events($id);
        $form->initForm();

        $this->view->form = $form->render();
        $this->view->pick('events/form');
    }

    /**
     * @Route("/save", methods={"POST", "PUT"}, name="event-save")
     */
    public function saveAction()
    {
        $postParams = $this->request->getPost();
        $id = null;
        if (isset($postParams['id'])) {
            $id = $postParams['id'];
        }
        $form = new \Event\Form\Events($id);
        $form->initForm();
        $result = $form->saveData($postParams);

        if ($result) {
            $this->response->redirect("/event", true);
            //Disable the view to avoid rendering
            $this->view->disable();
        } else {
            $this->view->form = $form->render();
            $this->view->pick('events/form');
        }
    }

    /**
     * @Route("/delete/{id:[0-9]+}", methods={"GET"}, name="event-delete")
     */
    public function deleteAction($id)
    {
        $form = new \Event\Form\Events();
        $result = $form->delete($id);
        if ($result === true) {
            $this->response->redirect("/event");
        } else {
            var_dump($result);
            die;
        }

        //Disable the view to avoid rendering
        $this->view->disable();
    }

    /**
     * @Route("/add", methods={"GET"}, name="event-add")
     */
    public function addAction()
    {
        if (!$this->aclAdapter->isRole('user')) {
            $this->aclAdapter->addRole('user');
            $this->aclAdapter->allow('user', 'event_events', 'index');
        }

        /*if ($this->viewer->getRole() == 'guest') {
            $this->viewer->setRole('user');
            if (!$this->aclAdapter instanceof \Engine\Acl\Adapter\Database) {
                throw new \Exception(('tette'));
            }
        }*/
        if ($this->viewer->getRole() == 'user') {
            $this->viewer->setRole('guest');
            if (!$this->aclAdapter instanceof \Engine\Acl\Adapter\Database) {
                throw new \Exception(('tette'));
            }
        }
    }
}

