<?php

namespace components\web;

/**
 * Class Template
 * @package components\web
 */
class Template
{
    /**
     * @var string
     */
    private $layout = 'layouts/main';

    /**
     * @var string
     */
    private $viewsPath;

    /**
     * Template constructor.
     * @param string $viewsPath
     */
    public function __construct($viewsPath)
    {
        $this->viewsPath = $viewsPath;
    }

    /**
     * @param string $layout
     */
    public function setLayout($layout)
    {
        $this->layout = $layout;
    }

    /**
     * @param string $template
     * @param array $variables
     * @return string
     */
    public function render($template, array $variables = [])
    {
        $content = $this->renderPartial($template, $variables);
        return $this->renderPartial($this->layout, [
            'content' => $content
        ]);
    }

    /**
     * @param string $template
     * @param array $variables
     * @return string
     */
    public function renderPartial($template, array $variables = [])
    {
        extract($variables);

        $templatePath = "{$this->viewsPath}/{$template}.php";
        if (!file_exists($templatePath)) {
            $this->renderSelfError("Template '{$template}' is not defined");
        }

        ob_start();
        require_once $templatePath;
        return ob_get_clean();
    }

    public function renderSelfError($error)
    {
        die($error);
    }
}