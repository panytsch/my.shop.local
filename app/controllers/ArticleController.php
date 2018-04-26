<?php

namespace app\controllers;

use app\models\Comment;
use components\Paginator;
use components\web\Controller;
use app\models\Article;
use helpers\ResponseHelper;
use helpers\SessionHelper;
use helpers\StringHelper;

class ArticleController extends Controller
{
    /**
     * @return string
     */
    public function actionIndex()
    {
        return 'нічого тут поки немає';
    }

    /**
     * @param null $id
     * @return string
     */
    public function actionNews($id = null){
        $model = new Article();
        $data = $model->getArticle($id);
        $model->setView($id);
        if (SessionHelper::getFlash('admin', false) == false || SessionHelper::getFlash('user', false) == false){
            $data['description'] = substr($data['description'],0,350).'...(<a href="/user/login">login to continue</a>)';
        }
        $data['comments'] = (new Comment())->getCommentsForArticle($id);
        return $this->getTemplate()->render('article/list', ['data' => $data]);
    }

    public function actionAddcomment()
    {
        $comment = trim($_POST['comment']);
//        var_dump($comment);die();
        if ($comment){
            $model = new Comment();
            $model->setComment($_POST['refer'], $comment, SessionHelper::getFlash('userId', false));
        }
        ResponseHelper::redirect("/article/news/?id={$_POST['refer']}");

    }

    /**
     *
     */
    public function actionVote()
    {
        if (SessionHelper::getFlash('admin', false) == true || SessionHelper::getFlash('user', false) == true){
            $model = new Comment();
            $model->setRate($_POST['action'], $_POST['id']);
        }
        ResponseHelper::redirect($_POST['refer']);
    }

    /**
     * @param int $page
     * @param string $category
     * @return string
     */
    public function actionCategories($page = 1,$category = 'Internet')
    {
        $itemPerPage = 5;
        $modelA = new Article();
        $data = $modelA->getSliceArticleByCategory(($page-1)*$itemPerPage,$itemPerPage,$category);
        $paginator = new Paginator($modelA->getCountForCategory($category),$itemPerPage, $page);
        $data['buttons'] = $paginator->buttons;
        return $this->getTemplate()->render('/category/categoryList', ['data' => $data]);
    }

    /**
     * @param string $tag
     * @return string
     */
    public function actionTaglist($tag = 'lorem')
    {
        $model = new Article();
        $articleList = $model->getArticleListByTag($tag);
        return $this->getTemplate()->render('/article/listByTag',['articleList' => $articleList]);
    }

    /**
     * @param int $page
     * @return string
     */
    public function actionAnalitic($page = 1)
    {
        $itemPerPage = 5;
        $modelA = new Article();
        $data = $modelA->getSliceAnalitic(($page-1)*$itemPerPage,$itemPerPage);
//        var_dump($data);die();
        $paginator = new Paginator($modelA->getCountAnalitic(),$itemPerPage, $page);
        $data['buttons'] = $paginator->buttons;
        return $this->getTemplate()->render('/category/analitic', ['data' => $data]);
    }
}