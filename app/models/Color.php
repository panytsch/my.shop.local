<?php
/**
 * Created by PhpStorm.
 * User: romeo
 * Date: 24.04.2018
 * Time: 14:41
 */

namespace app\models;


use components\web\Model;
use PDO;

class Color extends Model
{

    public function __construct()
    {
        parent::__construct();
        $this->tableName = 'color';
    }

    /**
     * @param string $color
     */
    public function setColor(string $color)
    {
        $stm = $this->db->prepare("UPDATE `{$this->tableName}` SET `color` = '{$color}'");
        $stm->execute();
    }

    /**
     * @return string
     */
    public function getColor()
    {
        $stm = $this->db->prepare("SELECT `color` FROM `{$this->tableName}`");
        $stm->execute();
        return $stm->fetch(PDO::FETCH_ASSOC)['color'];
    }
}