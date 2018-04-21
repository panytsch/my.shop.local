<?php
/**
 * Created by PhpStorm.
 * User: romeo
 * Date: 19.04.2018
 * Time: 18:16
 */

namespace app\models;


use components\web\Model;
use PDO;

class Article extends Model
{

    /**
     * Category constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->tableName = 'articles';
    }

    /**
     * @param $name
     * @return mixed
     */
    public function getArticle($name)
    {
        $stm = $this->db->prepare("SELECT * FROM `{$this->tableName}` WHERE `title` LIKE '{$name}'");
        $stm->execute();
        return $stm->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * @param int $id
     * @return mixed
     */

    public function getArticlebyID(int $id)
    {
        $stm = $this->db->prepare("SELECT * FROM `{$this->tableName}` WHERE `id` = {$id}");
        $stm->execute();
        return $stm->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * @param int $minId
     * @param int $maxId
     * @return array
     */
    public function getSliceArticle(int $minId, int $maxId)
    {
        $stm = $this->db->prepare("SELECT `{$this->tableName}`.id, `{$this->tableName}`.title, `{$this->tableName}`.small_description, `{$this->tableName}`.description, `{$this->tableName}`.tag1,  `{$this->tableName}`.img, categories.name FROM `{$this->tableName}` JOIN categories ON `{$this->tableName}`.category_id = categories.id WHERE `{$this->tableName}`.id >= {$minId} and `{$this->tableName}`.id < {$maxId}");
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }
}