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

namespace Event\Helper;

class RenderContent extends \Phalcon\Tag
{
    static public function _(\Phalcon\DI $di, array $args)
    {
        $content = '';

        return $content;
        $page = \Core\Model\Page::findFirst("type = '{$args[0]}'");
        $widgets = $page->getWidgets();
        $widgetRender = new RenderWidget();

        foreach ($widgets as $widget) {
            $content .= $widgetRender->_($di, array($widget->widget_id, $widget->getParams()));
        }

        return $content;
    }
}