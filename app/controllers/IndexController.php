<?php
/**
 * Created by PhpStorm.
 * User: romeo
 * Date: 17.04.2018
 * Time: 11:21
 */

namespace app\controllers;


use app\models\Category;
use components\web\Controller;

class IndexController extends Controller
{

    public function actionIndex()
    {
//        $model = new Category();
//        $data = $model->getArticleList();
//        var_dump($data);
        return $this->getTemplate()->renderPartial('index', ['content' => 'hello word']);
    }

}