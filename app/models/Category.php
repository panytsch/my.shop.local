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
        $this->tableName = 'categories';
    }

    /**
     * @return array
     */
    public function getArticleList()
    {
        $data = $this->getList('name');
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

    public function getIdByName(string $name,string $field)
    {
        $stm = $this->db->prepare("SELECT id FROM `{$this->tableName}` WHERE `{$field}` = '{$name}'");
        $stm->execute();
        return $stm->fetch()[0];
    }
}