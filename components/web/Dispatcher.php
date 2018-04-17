<?php

namespace components\web;

use components\AbstractDispatcher;
use components\Config;
use helpers\ArrayHelper;

/**
 * Class Dispatcher
 * @package components\web
 */
class Dispatcher extends AbstractDispatcher
{
    public function __construct()
    {
        $this->rout = trim($_SERVER['REQUEST_URI'], " \t\n\r\0\x0B/");
        $parts = $this->prepareUrlToParts();
        $defaultController = Config::get('defaults.controller', 'index');
        $controllerPart = ArrayHelper::getValue($parts, 0, $defaultController);
        $this->controller = $this->prepareControllerClassName($controllerPart);

        $defaultAction = Config::get('defaults.action', 'index');
        $actionPart = ArrayHelper::getValue($parts, 1, $defaultAction);
        $this->action = $this->prepareActionFunctionName($actionPart);
    }

    /**
     * @return array
     */
    public function getParams()
    {
        return $_GET;
    }
}
