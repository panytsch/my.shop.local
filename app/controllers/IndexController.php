<?php

namespace app\controllers;

use app\models\Article;
use app\models\Category;
use app\models\Comment;
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
        $modelComment = new Comment();
        $topUsers = $modelComment->getTopUsers();
        $lastest = (new Article())->getLastThreeArticle();

        $topThemes = $model->getTopThreeThemes();
//        var_dump($topThemes);die();
        return $this->getTemplate()->render('index', ['categoryArray' => $data, 'lastestArticles' => $lastest, 'topUsers' => $topUsers, 'themes' => $topThemes]);
    }
}