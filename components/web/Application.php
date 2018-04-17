<?php

namespace components\web;

use Exception;
use exceptions\NotAuthorisedException;
use components\Config;
use components\Router;
use helpers\ResponseHelper;

/**
 * Class Application
 * @package components\web
 */
class Application extends \components\Application
{
    public function run()
    {
        $dispatcher = new Dispatcher();
        try {
            return (new Router($dispatcher))->init();
        } catch (NotAuthorisedException $exception) {
            ResponseHelper::redirect(Config::get('loginPage'));
            return null;
        } catch (Exception $exception) {
            return Application::getTemplate()->render('index/error', [
                'exception' => $exception
            ]);
        }
    }

    /**
     * @var null|Template
     */
    private static $template = null;

    /**
     * @return Template
     */
    public static function getTemplate()
    {
        if (null === self::$template) {
            $viewsPath = Config::get('viewsPath');
            self::$template = new Template($viewsPath);
        }

        return self::$template;
    }
}