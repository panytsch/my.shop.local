<?php

namespace app\models;


use components\web\Model;

/**
 * Class Category
 * @package app\models
 */

class Category extends Model
{
    public function __construct()
    {
        parent::__construct();

    }

    public function getArticleList(){
        $stm = $this->db->prepare('SELECT `title` FROM `articles`');
        $stm->execute();
        return $stm->fetchAll();
    }
}