<?php

namespace app\controllers;

use app\models\Color;
use app\models\Comment;
use DateTime;

class TestController
{
    /**
     * @param int $test
     */
    public function actionIndex($test=0)
    {
        var_dump((new Comment())->getCommentsForArticle(3));
    }

}