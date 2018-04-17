<?php

namespace components;

use helpers\ArrayHelper;

/**
 * Class Router
 * @package components
 */
class Router
{
    /**
     * @var AbstractDispatcher
     */
    private $dispatcher;

    /**
     * Router constructor.
     * @param AbstractDispatcher $dispatcher
     */
    public function __construct(AbstractDispatcher $dispatcher)
    {
        $this->dispatcher = $dispatcher;
    }

    /**
     * @return mixed
     * @throws \Exception
     */
    public function init()
    {
        $controller = $this->dispatcher->getControllerClassName();
        if (!class_exists($controller)) {
            throw new \Exception("Controller can not be loaded");
        }

        $controllerObject = new $controller;

        $action = $this->dispatcher->getActionMethodName();
        if (!method_exists($controllerObject, $action)) {
            throw new \Exception("Action can not be loaded");
        }
        $parameters = $this->prepareActionParameters(
            $controller,
            $action,
            $this->dispatcher->getParams()
        );

        return call_user_func_array([$controllerObject, $action], $parameters);
    }

    private function prepareActionParameters($controller, $action, array $parameters)
    {
        $method = new \ReflectionMethod($controller, $action);
        $attributes = $method->getParameters();
        $requiredAttributes = $method->getNumberOfRequiredParameters();

        $required = $this->prepareArgumentsList(array_slice($attributes, 0, $requiredAttributes));
        $additional = $this->prepareArgumentsList(array_slice($attributes, $requiredAttributes));

        foreach ($parameters as $key => $value) {
            ArrayHelper::replace($required, $key, $value);
            ArrayHelper::replace($additional, $key, $value, true);
        }

        return array_merge($required, $additional);
    }

    /**
     * @param \ReflectionParameter[] $arguments
     * @return array
     */
    private function prepareArgumentsList(array $arguments)
    {
        $result = [];
        foreach ($arguments as $argument) {
            $default = $argument->isDefaultValueAvailable() ? $argument->getDefaultValue() : null;
            $result[$argument->name] = $default;
        }

        return $result;
    }
}
