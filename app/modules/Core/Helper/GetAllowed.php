<?php
namespace Core\Helper;

class GetAllowed extends \Phalcon\Tag
{
    static public function _(\Phalcon\DI $di, array $args)
    {
        $viewer = \User\Model\User::getViewer();
        return $di->get('core')->acl()->getAllowedValue($args[0], $viewer->getRole(), $args[1]);
    }
}