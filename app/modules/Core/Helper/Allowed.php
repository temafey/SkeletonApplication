<?php

namespace Core\Helper;

class Allowed extends \Phalcon\Tag
{
    static public function _(\Phalcon\DI $di, array $args)
    {
        $viewer = \User\Model\User::getViewer();
        return $di->get('core')->acl()->_()->isAllowed($viewer->getRole()->name, $args[0], $args[1]) == \Phalcon\Acl::ALLOW;
    }
}