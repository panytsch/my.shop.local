<?php

namespace app\controllers;


use app\models\Article;
use app\models\Category;
use components\web\Controller;

class IndexController extends Controller
{
    /**
     * @return string
     */
    public function actionIndex()
    {
        $model = new Category();
        $categoryArray = $model->getArticleList();

        $data = [];
        foreach ($categoryArray as $value){
            $data[$value]=$model->getTitleList($value);
        }

        $lastest = (new Article())->getLastThreeArticle();
        return $this->getTemplate()->render('index', ['categoryArray' => $data, 'lastestArticles' => $lastest]);
    }
}