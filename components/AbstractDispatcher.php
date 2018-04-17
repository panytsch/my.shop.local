<?php

namespace components;

use helpers\StringHelper;

/**
 * Class AbstractDispatcher
 * @package components
 */
abstract class AbstractDispatcher
{
    /**
     * @var string
     */
    protected $rout;

    /**
     * @var string
     */
    protected $controller;

    /**
     * @var string
     */
    protected $action;

    /**
     * @var array
     */
    protected $params = [];

    /**
     * @return string
     */
    public function getControllerClassName()
    {
        return $this->controller;
    }

    /**
     * @return string
     */
    public function getActionMethodName()
    {
        return $this->action;
    }

    /**
     * @return array
     */
    abstract public function getParams();

    /**
     * @return array
     */
    protected function prepareUrlToParts()
    {
        $getParamsStart = strpos($this->rout, '?');
        if (false !== $getParamsStart) {
            $this->rout = substr($this->rout, 0, $getParamsStart);
        }

        return array_filter(explode('/', $this->rout));
    }

    /**
     * @param string $urlPart
     * @return string
     */
    protected function prepareControllerClassName($urlPart)
    {
        $namespace = Config::get('controllersNamespace');
        $namespace = StringHelper::rtrim($namespace, '\\');

        return $namespace . '\\' . StringHelper::camelize($urlPart) . 'Controller';
    }

    /**
     * @param string $urlPart
     * @return string
     */
    protected function prepareActionFunctionName($urlPart)
    {
        return 'action' . StringHelper::camelize($urlPart);
    }
}