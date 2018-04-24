<?php

namespace app\controllers;

use app\models\Color;
use DateTime;

class TestController
{
    /**
     * @param int $test
     */
    public function actionIndex($test=0)
    {
        $a = 'tag tag2 tag3';
        var_dump(mb_split('\s', $a));
    }

}