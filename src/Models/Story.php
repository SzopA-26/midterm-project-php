<?php

namespace App\Models;

class Story extends Model
{
    protected $table = 'posts';

    public function insert($title, $content, $publish, $user_id) {
        $sql = "INSERT INTO posts (`title`, `content`, `publish`, `created_at`, `updated_at`, `user_id`) "
                ." VALUES(:title, :content, :publish, NOW(), NOW(), :user_id)";
        $data = $this->db->queryAll($sql ,[
            ':title' => $title,
            ':content' => $content,
            ':publish' => $publish,
            ':user_id' => $user_id
        ]);
        return $data;
    }

    public function update($title, $content, $publish, $title_id) {
        $sql = "UPDATE posts SET"
                ." `title` = :title"
                ." `content` = :content" 
                ." `publish` = :publish"
                ." `updated_at` = NOW()"
                ." WHERE (`id` = :title_id)";
        $data = $this->db->queryFirst($sql, [
            ':title' => $title,
            ':content' => $content,
            ':publish' => $publish,
            ':title_id' => $title_id
        ]);
        return $data;
    }

    public function delete($title_id) {
        $sql = "UPDATE posts SET"
            . " `deleted_at = NOW()"
            . " WHERE (`id` = :title_id)";
        $data = $this->db->queryFirst($sql, [
            ':title_id' => $title_id
        ]);
        return $data;
    }

    public function select_by_username($username) {
        $sql = "SELECT * FROM posts"
            . " WHERE (`username` = :username AND `deleted_at` = NULL)";
        $data = $this->db->queryAll($sql, [
            ':username' => $username
        ]);
        return $data;
    }

    public function select_by_new($n) {
        $sql = "SELECT * FROM posts"
            . " ORDER BY `id` DESC LIMIT :n"
            . " WHERE (`deleted_at` = NULL)";
        $data = $this->db->queryAll($sql, [
            ':n' => $n
        ]);
        return $data;
    }

}