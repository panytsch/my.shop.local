<?php
/**
 * Created by PhpStorm.
 * User: romeo
 * Date: 19.04.2018
 * Time: 10:44
 */

namespace components\web;


class Controller extends \components\Controller
{
    /**
     * @return Template
     */
    protected function getTemplate()
    {
        return Application::getTemplate();
    }
}