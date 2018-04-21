<?php

namespace app\models;


use components\web\Model;
use helpers\RequestHelper;
use helpers\ResponseHelper;
use helpers\SessionHelper;
use PDO;
/**
 * Class User
 * @package app\models
 */

class User extends Model
{
    /**
     * User constructor.
     */

    public function __construct()
    {
        parent::__construct();
        $this->tableName = 'users';
    }

    /**
     * @param string $email
     * @param string $password
     * @return mixed
     */
    public function getUserData(string $email, string $password)
    {
        $stm = $this->db->prepare("SELECT `{$this->tableName}`.email, `{$this->tableName}`.password, `permission`.type FROM `{$this->tableName}` JOIN `permission` ON `{$this->tableName}`.permission_id = `permission`.id AND (permission.type = 'admin' OR permission.type = 'moderator') AND users.email = '{$email}' AND users.password = '{$password}'");
        $stm->execute();
        $data = $stm->fetchAll(PDO::FETCH_ASSOC);
        if (!empty($data)){
            return $data[0];
        } else {
            return null;
        }
    }
}