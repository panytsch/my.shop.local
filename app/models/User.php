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
        $stm = $this->db->prepare("SELECT `{$this->tableName}`.email, `{$this->tableName}`.password, `permission`.type FROM `{$this->tableName}` JOIN `permission` ON `{$this->tableName}`.permission_id = `permission`.id AND (permission.type = 'admin' OR permission.type = 'moderator') AND users.email = '{$email}'");
        $stm->execute();
        $data = $stm->fetchAll(PDO::FETCH_ASSOC);
        if (!empty($data)){
            if(!password_verify($password,$data[0]['password'])){
                return null;
            }
            return $data[0];
        } else {
            return null;
        }
    }

    /**
     * @param $pass
     * @param $email
     * @return array|null
     */
    public function getUser($pass, $email)
    {
//        $pass = password_hash($pass, PASSWORD_DEFAULT);
        $stm = $this->db->prepare("SELECT * FROM users WHERE users.email = '{$email}'");
        $stm->execute();
        $data = $stm->fetchAll(PDO::FETCH_ASSOC);
        if (!empty($data)){
            if(!password_verify($pass,$data[0]['password'])){
                return null;
            }
            return $data[0];
        } else {
            return null;
        }
    }
}