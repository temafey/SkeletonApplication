<?php

namespace Event\Helper;

class Setting extends \Phalcon\Tag
{
    static public function _(\Phalcon\DI $di, array $args){
        return \Core\Model\Settings::getSetting($args[0], (!isset($args[1])?null:$args[1]));
    }
}