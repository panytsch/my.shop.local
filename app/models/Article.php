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

    public function getArticle($name)
    {
        $stm = $this->db->prepare("SELECT * FROM `{$this->tableName}` WHERE `title` LIKE '{$name}'");
        $stm->execute();
        return $stm->fetch(PDO::FETCH_ASSOC);
    }
}