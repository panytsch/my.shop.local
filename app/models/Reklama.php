<?php
/**
 * Created by PhpStorm.
 * User: panytsch
 * Date: 4/28/18
 * Time: 4:13 PM
 */

namespace app\models;


use components\web\Model;

class Reklama extends Model
{

    /**
     * Reklama constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->tableName = 'reklama';
    }

    /**
     * @param $text
     * @param $price
     * @param $url
     * return void
     */
    public function addNew($text, $price, $url)
    {
        $stm = $this->db->prepare("INSERT INTO `{$this->tableName}` (text, price, url) VALUES ('{$text}', {$price}, '{$url}')");
        $stm->execute();
    }

    public function delete($id)
    {
        $stm = $this->db->prepare("DELETE FROM `{$this->tableName}` WHERE id = {$id}");
        $stm->execute();
    }
}