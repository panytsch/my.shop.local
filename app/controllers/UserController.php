<?php

namespace app\controllers;

use app\models\Category;
use app\models\Comment;
use app\models\User;
use components\Paginator;
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
    public function actionSearch($a = 'a')
    {
        $model = new Category();
        $data = $model->getListLike($a);
        if (!empty($data)) {
            $result = '';
            foreach ($data as $val) {
                $result .= '<li><a href="/article/categories?category=' . $val['name'] . '">' . $val['name'] . '</a></li>';
            }
        } else {
            $result = 'No match';
        }
        echo $result;
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
                SessionHelper::addFlash('userId',$data['id']);
                ResponseHelper::redirect('/');
            }
        }
    }

    /**
     *
     */
    public function actionCheckreg()
    {
        $array = $_POST;
        if (empty($array['email']) || empty($array['password']) || empty($array['repassword']) || ($array['repassword'] !== $array['password']) ){
            SessionHelper::addFlash('error','Your data is wrong');
            ResponseHelper::redirect('/user/login', 301);
        } else {
            $model = new User();
            $data = $model->setUser($array['password'],$array['email']);
            if (!$data){
                SessionHelper::addFlash('error','Something wrong');
                ResponseHelper::redirect('/user/registration', 301);
            } else {
                SessionHelper::addFlash('user', true);
                ResponseHelper::redirect('/');
            }
        }
    }

    /**
     *
     */
    public function actionLogout()
    {
        SessionHelper::getFlash('user');
        SessionHelper::getFlash('userId');
        ResponseHelper::redirect('/');
    }

    /**
     * @return string
     */
    public function actionRegistration()
    {
        if (SessionHelper::getFlash('user',false)===true){
            ResponseHelper::redirect('/');
        }
        return $this->getTemplate()->render('/user/registration');
    }

    /**
     *
     */
    public function actionIndex()
    {
        ResponseHelper::redirect('/');
    }

    public function actionComments($userId = 1, $page = 1)
    {
        $itemPerPage = 5;
        $modelA = new Comment();
        $data = $modelA->getCommentsSliceByUser(($page-1)*$itemPerPage,$itemPerPage,$userId);

        $paginator = new Paginator($modelA->getCountByUser($userId),$itemPerPage, $page);
        $data['buttons'] = $paginator->buttons;
//       empty($data[0])
        return $this->getTemplate()->render('/comment/commentList', ['data' => $data]);
    }
}