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
        $stm = $this->db->prepare("SELECT comments.id, comments.rate, comments.verified, comments.comment, users.email, users.id AS userId, comments.date FROM `comments` JOIN `users` WHERE comments.article_id = {$articleId} AND users.id = comments.user_id");
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
}