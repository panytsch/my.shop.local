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
        echo (new Color())->getColor();
    }

}