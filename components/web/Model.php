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
            $stm = $this->db->prepare("UPDATE `{$this->tableName}` SET title = '{$title}', small_description = '{$minDesc}', description = '{$desc}', category_id = '{$category}', tag1 = '{$tags}' WHERE id = {$id}");
        } else {
            $stm = $this->db->prepare("UPDATE `{$this->tableName}` SET title = '{$title}', small_description = '{$minDesc}', description = '{$desc}', category_id = '{$category}', tag1 = '{$tags}', img = '{$img}' WHERE id = {$id}");
        }
        $stm->execute();
    }

}