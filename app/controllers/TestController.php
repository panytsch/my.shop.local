<?php

namespace app\controllers;

use app\models\Category;

class TestController
{

    public function actionIndex($a = 'a')
    {
        $model = new Category();
        $data = $model->getListLike($a);
        if (!empty($data)){
            $result = '';
            foreach ($data as $val){
                $result .= '<a href="/article/categories?category=' . $val['name'] . '">' . $val['name'] . '</a>';
            }
        } else {
            $result = 'No match';
        }
        echo $result;
    }

}