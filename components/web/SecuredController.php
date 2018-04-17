<?php

namespace components\web;
use components;
use exceptions\NotAuthorisedException;
use helpers\SessionHelper;

/**
 * Class SecuredController
 * @package components\web
 */
class SecuredController extends Controller
{
    public function __construct()
    {
        if (empty(SessionHelper::get('user'))) {
            throw new NotAuthorisedException();
        }
    }

    /**
     * @return Template
     */
    public function getTemplate()
    {
        $template = parent::getTemplate();
        $template->setLayout('layouts/main');

        return $template;
    }
}
