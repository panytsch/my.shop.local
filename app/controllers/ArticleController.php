<?php

namespace app\controllers;

use components\Paginator;
use components\web\Controller;
use app\models\Article;

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
        return $this->getTemplate()->render('article/list', ['data' => $data]);
    }

    /**
     * @param int $page
     * @param string $category
     * @return string
     */
    public function actionCategories($page = 1,$category = 'Інтернет')
    {
        $itemPerPage = 5;
        $modelA = new Article();
        $data = $modelA->getSliceArticleByCategory(($page-1)*$itemPerPage,$itemPerPage,$category);
        $paginator = new Paginator($modelA->getCountForCategory($category),$itemPerPage, $page);
        $data['buttons'] = $paginator->buttons;
//        var_dump($data);die();
//        var_dump($data[0]['img']);die();
        return $this->getTemplate()->render('/category/categoryList', ['data' => $data]);
    }
}