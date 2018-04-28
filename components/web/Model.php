<?php

namespace components\web;

use helpers\ArrayHelper;
use PDO;
class Model
{
    /**
     * @var \PDO
     */
    protected $db;

    /**
     * @var string
     */
    protected $tableName;

    public function __construct()
    {
        $this->db = Application::getDb()->getConnection();
    }

    /**
     * @param $field
     * @return array
     */
    public function getAll($field){
        $stm = $this->db->prepare("SELECT {$field} FROM `{$this->tableName}`");
        $stm->execute();
        $data = $stm->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
    /**
     * @param $title
     * @return array
     */
    public function getList($title){
        $stm = $this->db->prepare("SELECT `{$title}` FROM `{$this->tableName}`");
        $stm->execute();
        $data = $stm->fetchAll();
        $data = ArrayHelper::tarnsformArray($data, $title);
        return $data;
    }

    /**
     * @param string $field
     * @return null||int
     */
    public function getCount(string $field)
    {
        $stm = $this->db->prepare("SELECT COUNT({$field}) FROM `{$this->tableName}`");
        $stm->execute();
        $data = $stm->fetchAll(PDO::FETCH_NUM);
        if (empty($data)){
            return null;
        }
        return (int)$data[0][0];
    }

    /**
     * @param string $field
     * @return int|null
     */
    public function getCountForCategory(string $field)
    {
        $stm = $this->db->prepare("SELECT COUNT(articles.id) FROM articles JOIN categories ON categories.id = articles.category_id WHERE categories.name = '{$field}'");
        $stm->execute();
        $data = $stm->fetchAll(PDO::FETCH_NUM);
        if (empty($data)){
            return null;
        }
        return (int)$data[0][0];
    }

    /**
     * @param string $id
     * @param string $title
     * @param string $minDesc
     * @param string $desc
     * @param string $category
     * @param string $tags
     * @param string $img
     * @return void
     */
    public function setUpdatedNew(string $id,string $title,string $minDesc,string $desc,string $category,string $tags,$img)
    {
        if (empty($img)){
            $stm = $this->db->prepare("UPDATE `{$this->tableName}` SET title = '{$title}', small_description = '{$minDesc}', description = '{$desc}', category_id = '{$category}', tag1 = '{$tags}', img = 'image-not-found.jpg' WHERE id = {$id}");
        } else {
            $stm = $this->db->prepare("UPDATE `{$this->tableName}` SET title = '{$title}', small_description = '{$minDesc}', description = '{$desc}', category_id = '{$category}', tag1 = '{$tags}', img = '{$img}' WHERE id = {$id}");
        }
        $stm->execute();
    }

    /**
     * @param $minId
     * @param $maxId
     * @return array
     */
    public function getSliceListJoin($minId,$maxId,$joinTable,$keyId)
    {
        $stm = $this->db->prepare("SELECT * FROM `{$this->tableName}` JOIN `{$joinTable}` ON `{$this->tableName}`.{$keyId} = `{$joinTable}`.id WHERE `{$this->tableName}`.id >= {$minId} and `{$this->tableName}`.id < {$maxId}");
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * @param $minId
     * @param $maxId
     * @return array
     */
    public function getSliceList($minId, $maxId)
    {
        $stm = $this->db->prepare("SELECT * FROM `{$this->tableName}` WHERE `{$this->tableName}`.id >= {$minId} and `{$this->tableName}`.id < {$maxId}");
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * @param string $field
     * @param string $data
     */
    public function setField($field, $data)
    {
        $stm = $this->db->prepare("INSERT INTO `{$this->tableName}` (`{$field}`) VALUES ('{$data}')");
        $stm->execute();
    }
}