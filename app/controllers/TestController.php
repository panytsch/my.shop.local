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
        var_dump((new DateTime())->getTimestamp());
    }
}