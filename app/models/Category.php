<?php

namespace app\models;


use components\web\Model;
use helpers\ArrayHelper;

/**
 * Class Category
 * @package app\models
 */

class Category extends Model
{
    /**
     * Category constructor.
     */
    public function __construct()
    {
        parent::__construct();

    }

    /**
     * @param string $title
     * @param string $from
     * @return array
     */

    public function getList($title = 'name', $from = 'categories'){
        $stm = $this->db->prepare("SELECT `{$title}` FROM `{$from}`");
        $stm->execute();
        $data = $stm->fetchAll();
        $data = ArrayHelper::tarnsformArray($data, $title);
        return $data;
    }

    /**
     * @return array
     */

    public function getArticleList()
    {
        $data = $this->getList();
        return $data;
    }

    /**
     * @param string $category
     * @return array
     */

    public function getTitleList($category = 'Інтернет')
    {
        $stm = $this->db->prepare("SELECT articles.title, categories.name FROM articles JOIN categories ON articles.category_id = categories.id WHERE categories.name = '{$category}' LIMIT 5");
        $stm->execute();
        $data = $stm->fetchAll();

        $data = ArrayHelper::tarnsformArray($data, 'title');
        return $data;
    }
}