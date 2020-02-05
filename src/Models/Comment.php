<?php

namespace App\Models;

class Comment extends Model
{
    public function insert($content, $post_id, $user_id) {
        $sql = "INSERT INTO comments (`content`, `created_at`, `post_id`, `user_id`) "
                ." VALUES(:content, NOW(), :post_id, :user_id)";
        $data = $this->db->queryAll($sql ,[
            ':content' => $content,
            ':post_id' => $post_id,
            ':user_id' => $user_id
        ]);
        return $data;
    }

    public function delete($comment_id) {
        $sql = "UPDATE comments SET"
            . " `deleted_at = NOW()"
            . " WHERE (`id` = :comment_id)";
        $data = $this->db->queryFirst($sql, [
            ':comment_id' => $comment_id
        ]);
        return $data;
    }

    public function select_by_username($username) {
        $sql = "SELECT * FROM comments"
            . " WHERE `username` = :username AND `deleted_at` is NULL";
        $data = $this->db->queryAll($sql, [
            ':username' => $username
        ]);
        return $data;
    }

    public function select_by_post_id($post_id) {
        $sql = "SELECT * FROM comments"
            . " WHERE `post_id` = :post_id AND `deleted_at` is NULL";
        $data = $this->db->queryAll($sql, [
            ':post_id' => $post_id
        ]);
        return $data;
    }

    public function select_by_post_id_join_users($post_id) {
        $sql = "SELECT `comments`.`id`,`comments`.`content`,`comments`.`created_at`,`comments`.`post_id`,`users`.`username`"
                ." FROM users JOIN comments ON `users`.`id`=`comments`.`user_id`"
                ." WHERE `post_id` = :post_id AND `deleted_at` is NULL";
        $data = $this->db->queryAll($sql, [
            ':post_id' => $post_id
        ]);
        return $data;
    }

    


}