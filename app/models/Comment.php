<?php

namespace app\models;


use components\web\Model;
use PDO;
/**
 * Class Comment
 * @package app\models
 */
class Comment extends Model
{
    /**
     * Comment constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->tableName = 'comments';
    }

    /**
     * @param $articleId
     * @return array
     */
    public function getCommentsForArticle($articleId)
    {
        $stm = $this->db->prepare("SELECT comments.id, comments.rate, comments.verified, comments.comment, users.email, users.id AS userId, comments.date FROM `comments` JOIN `users` WHERE comments.article_id = {$articleId} AND users.id = comments.user_id ORDER BY comments.rate DESC");
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }

    public function setRate($action, $id)
    {
        if ($action) {
            $stm = $this->db->prepare("UPDATE `comments` SET rate = rate + 1 WHERE id = {$id}");
        } else {
            $stm = $this->db->prepare("UPDATE `comments` SET rate = rate - 1 WHERE id = {$id}");
        }
        $stm->execute();
    }

    /**
     * @param $idArticle
     * @param $comment
     * @param $idUser
     * @return void
     */
    public function setComment($idArticle, $comment, $idUser)
    {
        $stm = $this->db->prepare("INSERT INTO `{$this->tableName}` (`article_id`, `comment`, `user_id`, `date`) VALUES ({$idArticle}, '{$comment}', {$idUser}, NOW())");
        $stm->execute();
    }

    public function getTopUsers()
    {
        $stm = $this->db->prepare("SELECT COUNT(comments.user_id) as count, users.id, users.email FROM `comments` JOIN users ON comments.user_id = users.id GROUP BY user_id LIMIT 5");
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * @param $minId
     * @param $maxId
     * @param $userId
     * @return array
     */
    public function getCommentsSliceByUser($minId,$maxId, $userId)
    {
        $stm = $this->db->prepare("SELECT comment, date, rate, user_id FROM `{$this->tableName}` WHERE user_id = {$userId} LIMIT {$minId}, {$maxId}");
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * @param $userId
     * @return mixed
     */
    public function getCountByUser($userId)
    {
        $stm = $this->db->prepare("SELECT COUNT(`user_id`) FROM `{$this->tableName}` WHERE user_id = {$userId}");
        $stm->execute();
        $data = $stm->fetchAll(PDO::FETCH_NUM);
        return $data[0][0];
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getCommentById($id)
    {
        $stm = $this->db->prepare("SELECT * FROM `{$this->tableName}` WHERE id = {$id}");
        $stm->execute();
        $data = $stm->fetch(PDO::FETCH_ASSOC);
        return $data;
    }

    /**
     * @param $id
     * @param $comment
     * @param $verified
     */
    public function changeCommentById($id, $comment, $verified)
    {
        $stm = $this->db->prepare("UPDATE `{$this->tableName}` SET comment = '{$comment}', verified = {$verified} WHERE id = {$id}");
        $stm->execute();
    }


    public function getAllCommentsSortVer(){
        $stm = $this->db->prepare("SELECT * FROM `{$this->tableName}` ORDER BY verified");
        $stm->execute();
        $data = $stm->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
}