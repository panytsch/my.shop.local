<?php

namespace components\web;

use helpers\ArrayHelper;

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
}