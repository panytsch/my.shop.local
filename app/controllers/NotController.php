<?php
/**
 * Created by PhpStorm.
 * User: romeo
 * Date: 17.04.2018
 * Time: 12:20
 */

namespace app\controllers;


class NotController
{
    public function actionIndex(){
        echo '<br>2';
    }
    public function actionChmo($a){
        echo $a;
    }
}