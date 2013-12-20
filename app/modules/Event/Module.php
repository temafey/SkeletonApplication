<?php
/**
 * @namespace
 */
namespace Event;

use Engine\Mvc\Module as BaseModule;

/**
 * Class Event Module
 *
 * @category   Module
 * @package    Event
 */
class Module extends BaseModule
{
    /**
     * Module name
     * @var string
     */
    protected $_moduleName = 'event';

    /**
     * Autoload module prefixes
     * @var array
     */
    protected $_loaders = [
        'controller',
        'model',
        'grid'
    ];

    /**
     * Register module services
     * @var array
     */
    protected $_services = [
        'dispatcher',
        'view',
        'volt',
        //'acl',
        //'viewer'
    ];

    /**
     * Registers an autoloader related to the module
     *
     * @param \Phalcon\DiInterface $dependencyInjector
     */
    public function registerAutoloaders($di)
    {
        parent::registerAutoloaders($di);
    }

    /**
     * Registers an autoloader related to the module
     *
     * @param \Phalcon\DiInterface $dependencyInjector
     */
    public function registerServices($di)
    {
        parent::registerServices($di);
    }
} 