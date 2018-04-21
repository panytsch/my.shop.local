<?php


namespace app\controllers;

use \components\web\Application;
use app\models\User;
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
        if (SessionHelper::getFlash('admin', false) === true){
            return $this->actionPanel();
        } else {
            return $this->getTemplate()->renderPartial('/admin/login');
        }
    }


    public function actionLogin()
    {
        if (SessionHelper::getFlash('admin', false) === true){
            ResponseHelper::redirect('/admin/panel');
        }

        $array = $_POST;
        if (empty($array['email']) || empty($array['password']) || empty($array['repassword']) || ($array['repassword'] !== $array['password']) ){
            SessionHelper::addFlash('error','Your data is wrong');
            ResponseHelper::redirect('/admin', 301);
        } else {
            $model = new User();
            $data = $model->getUserData($array['email'], $array['password']);
            if (null === $data){
                SessionHelper::addFlash('error','User is not defined');
                ResponseHelper::redirect('/admin', 301);
            } else {
                SessionHelper::addFlash('admin', true);
                return $this->actionPanel();
            }
        }
    }

    /**
     * @return string
     */
    public function actionPanel()
    {
        $this->getTemplate()->setLayout('admin/panelLayout');
        return $this->getTemplate()->render('/admin/panelIndex');
    }
}