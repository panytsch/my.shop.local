<?php
/**
 * Created by PhpStorm.
 * User: romeo
 * Date: 22.04.2018
 * Time: 17:21
 */

namespace app\controllers;

use app\models\User;
use components\web\Controller;
use helpers\ResponseHelper;
use helpers\SessionHelper;

class UserController extends Controller
{
    public function actionLogin()
    {
        if (SessionHelper::getFlash('user', false)){
            ResponseHelper::redirect('/');
        }
        return $this->getTemplate()->render('/user/loginForm');
    }

    /**
     *
     */
    public function actionCheck()
    {
        $array = $_POST;
        if (empty($array['email']) || empty($array['password']) || empty($array['repassword']) || ($array['repassword'] !== $array['password']) ){
            SessionHelper::addFlash('error','Your data is wrong');
            ResponseHelper::redirect('/user/login', 301);
        } else {
            $model = new User();
            $data = $model->getUser($array['password'],$array['email']);
            if (null === $data){
                SessionHelper::addFlash('error','User is not defined');
                ResponseHelper::redirect('/user/login', 301);
            } else {
                SessionHelper::addFlash('user', true);
                ResponseHelper::redirect('/');
            }
        }
    }

    public function actionLogout()
    {
        SessionHelper::getFlash('user');
        ResponseHelper::redirect('/');
    }
}