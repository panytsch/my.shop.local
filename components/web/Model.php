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
}