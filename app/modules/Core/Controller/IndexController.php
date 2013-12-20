<?php
/**
 * @namespace
 */
namespace Core\Controller;

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

    }

}

