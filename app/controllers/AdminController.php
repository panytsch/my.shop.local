<?php


namespace app\controllers;


use components\web\Controller;
use helpers\ResponseHelper;
use helpers\SessionHelper;

class AdminController extends Controller
{
    /**
     * @return string
     */

    public function actionIndex()
    {
        if (SessionHelper::get('admin') === true){
            ResponseHelper::redirect('/admin/panel');
        } else {
            return $this->getTemplate()->renderPartial('/admin/login');
        }
    }

    /**
     *
     */
    public function actionLogin()
    {
        if (SessionHelper::get('admin') === true){
            ResponseHelper::redirect('/admin/panel');
        }

        $array = $_POST;
        if (!$array['email'] || !$array['password'] || !$array['repassword'] || ($array['repassword'] !== $array['password']) ){
            ResponseHelper::redirect('/admin');
        } else {
            //закінчив тут, треба відпочити
        }
    }
}