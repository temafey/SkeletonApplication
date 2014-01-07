<?php

/**
 * PhalconEye
 *
 * LICENSE
 *
 * This source file is subject to the new BSD license that is bundled
 * with this package in the file LICENSE.txt.
 *
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to phalconeye@gmail.com so we can send you a copy immediately.
 *
 */

namespace Core\Helper;

class GetAllowed extends \Phalcon\Tag implements \Engine\HelperInterface
{
    static public function _(\Phalcon\DI $di, array $args){
        $viewer = \User\Model\User::getViewer();
        return $di->get('core')->acl()->getAllowedValue($args[0], $viewer->getRole(), $args[1]);
    }
}