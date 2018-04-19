<?php
/**
 * Created by PhpStorm.
 * User: romeo
 * Date: 19.04.2018
 * Time: 17:47
 */

namespace app\controllers;


use components\web\Controller;
use app\models\Article;

class ArticleController extends Controller
{
    public function actionIndex()
    {
        return 'нічого тут поки немає';
    }


    public function actionNews($name = null){
        $model = new Article();
        $data = $model->getArticle($name);
        return $this->getTemplate()->render('article/list', ['data' => $data]);
    }
}