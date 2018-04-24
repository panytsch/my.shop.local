<?php

namespace app\models;


use components\web\Model;

/**
 * Class Comment
 * @package app\models
 */
class Comment extends Model
{
    /**
     * Comment constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->tableName = 'comments';
    }
}