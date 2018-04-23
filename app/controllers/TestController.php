<?php

namespace app\controllers;

use DateTime;

class TestController
{
    /**
     * @param int $test
     */
    public function actionIndex($test=0)
    {
        $string = 'smile3';
        $hash = password_hash($string, PASSWORD_DEFAULT);
//        var_dump(password_verify($string,$hash));
        echo $hash;
    }

}