<?php
use Engine\Application as BaseApplication;

/**
 * Class Event Module
 *
 * @category   Module
 * @package    Event
 */
class Application extends BaseApplication
{

    /**
     * Config path
     * @var string
     */
    protected $_configPath = '/app/config/engine.php';

    /**
     * Loaders for different modes.
     *
     * @var array
     */
    protected $_services = [
        'logger',
        'loader',
        'environment',
        //'url',
        'cache',
        //'annotations',
        'router',
        'database',
        'session',
        //'flash'
    ];
}