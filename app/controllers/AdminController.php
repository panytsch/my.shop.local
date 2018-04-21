<?php


namespace app\controllers;

use app\models\Article;
use app\models\Category;
use \components\web\Application;
use app\models\User;
use components\web\Controller;
use helpers\FilesHelper;
use helpers\ResponseHelper;
use helpers\SessionHelper;

class AdminController extends Controller
{
    /**
     * AdminController constructor.
     */
    public function __construct()
    {
        $this->getTemplate()->setLayout('admin/panelLayout');
    }

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

    /**
     * @return string
     */
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
        return $this->getTemplate()->render('/admin/panelIndex');
    }

    /**
     * @return string
     *
     */
    public function actionArticlelist()
    {
        $model = new Article();
        $data = $model->getSliceArticle(1,5);
//        $data = $model->getCount('id'); //кількість всіх чогось в таблиці по переданому полю
//        var_dump($data);die();
        return $this->getTemplate()->render('/admin/articleList', ['data' => $data]);
    }

    /**
     * @param $id
     * @return string
     */

    public function actionChangearticle($id)
    {
        $model = new Article();
        $id  = (int)$id;
        $data = $model->getArticlebyID($id);
        $data['category'] = (new Category())->getList('name');
        return $this->getTemplate()->render('/admin/changearticle', ['data' => $data]);
    }

    public function actionUpdatearticle()
    {
        FilesHelper::moveById(($_POST['id']), $_FILES['img']['tmp_name'], $_FILES['img']['name']);
    }
}