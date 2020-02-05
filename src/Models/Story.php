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

    public function delete($post_id) {
        $sql = "UPDATE posts SET"
            . " `deleted_at = NOW()"
            . " WHERE (`id` = :post_id)";
        $data = $this->db->queryFirst($sql, [
            ':post_id' => $post_id
        ]);
        return $data;
    }

    public function select_by_post_id($post_id) {
        $sql = "SELECT * FROM posts"
            . " WHERE (`post_id` = :post_id AND `deleted_at` is NULL)";
        $data = $this->db->queryAll($sql, [
            ':post_id' => $post_id
        ]);
        return $data;
    }

    public function select_by_user_id($user_id) {
        $sql = "SELECT * FROM posts"
            . " WHERE (`user_id` = 7 AND `deleted_at` is null)";
        $data = $this->db->queryAll($sql, [
            // ':user_id' => 7
        ]);
        return $data;
    }

    public function select_by_new($n) {
        $sql = "SELECT * FROM posts"
            . " ORDER BY `id` DESC LIMIT :n"
            . " WHERE (`deleted_at` is NULL)";
        $data = $this->db->queryAll($sql, [
            ':n' => $n
        ]);
        return $data;
    }

}