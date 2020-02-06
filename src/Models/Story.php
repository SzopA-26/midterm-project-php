<?php

namespace App\Models;

class Story extends Model
{
    protected $table = 'posts';

    public function insert($title, $content, $user_id) {
        $sql = "INSERT INTO posts (`title`, `content`, `created_at`, `updated_at`, `user_id`)"
                ." VALUES(:title, :content, NOW(), NOW(), :user_id)";
        $data = $this->db->queryFirst($sql ,[
            ':title' => $title,
            ':content' => $content,
            ':user_id' => $user_id
        ]);
        return $data;
    }

    public function update($title, $content, $post_id) {
        $sql = "UPDATE posts SET"
                ." `title` = :title,"
                ." `content` = :content," 
                ." `updated_at` = NOW()"
                ." WHERE (`id` = :post_id)";
        $data = $this->db->queryFirst($sql, [
            ':title' => $title,
            ':content' => $content,
            ':post_id' => $post_id
        ]);
        return $data;
    }

    public function delete($post_id) {
        $sql = "UPDATE posts SET"
            . " `deleted_at` = NOW()"
            . " WHERE (`id` = :post_id)";
        $data = $this->db->queryFirst($sql, [
            ':post_id' => $post_id
        ]);
        return $data;
    }

    public function select_by_post_id($post_id) {
        $sql = "SELECT * FROM posts "
            . " WHERE (`id` = :post_id AND `deleted_at` is NULL AND `publish` = 1)";
        $data = $this->db->queryFirst($sql. " LIMIT 1", [
            ':post_id' => $post_id
        ]);
        return $data;
    }

    public function select_by_post_id_join_users($post_id) {
        $sql = "SELECT `posts`.`id`,`users`.`username`,`posts`.`title`,`posts`.`content`,`posts`.`publish`,`posts`.`published_at`"
            ." FROM posts JOIN `users` ON `posts`.`user_id`=`users`.`id`"
            . " WHERE (`posts`.`id` = :post_id AND `deleted_at` is NULL AND `publish` = 1)";
        $data = $this->db->queryFirst($sql. " LIMIT 1", [
            ':post_id' => $post_id
        ]);
        return $data;
    }

    public function select_by_user_id($user_id) {
        $sql = "SELECT * FROM posts"
            . " WHERE (`user_id` = :user_id AND `deleted_at` is null AND `publish` = 1)";
        $data = $this->db->queryAll($sql, [
            ':user_id' => $user_id
        ]);
        return $data;
    }

    public function select_by_user_id_all($user_id) {
        $sql = "SELECT * FROM posts"
            . " WHERE (`user_id` = :user_id AND `deleted_at` is null )";
        $data = $this->db->queryAll($sql, [
            ':user_id' => $user_id
        ]);
        return $data;
    }


    public function select_by_new_8() {
        $sql = "SELECT `posts`.*,`users`.`username` FROM posts JOIN users ON `posts`.`user_id` = `users`.`id`".
        " WHERE `publish` = 1 AND `deleted_at` is NULL".
        " order by `id` desc ";
        $data = $this->db->queryAll($sql . "LIMIT 8");
        return $data;
    }

    public function select_draft_by_user_id($user_id) {
        $sql = "SELECT * FROM posts"
            . " WHERE (`user_id` = :user_id AND `publish` = 0 AND `deleted_at` is NULL)";
        $data = $this->db->queryAll($sql, [
            ':user_id' => $user_id
        ]);
        return $data;
    }

    public function select_published_by_user_id($user_id) {
        $sql = "SELECT * FROM posts"
            . " WHERE (`user_id` = :user_id AND `publish` = 1 AND `deleted_at` is NULL)";
        $data = $this->db->queryAll($sql, [
            ':user_id' => $user_id
        ]);
        return $data;
    }

    public function update_publish($post_id) {
        $post = (new Story())->select_by_post_id($post_id);
        if ($post->publish == 1) {
            $sql = "UPDATE posts SET"
                . " `publish` = 0, `published_at` = NOW()"
                . " WHERE `id` = :post_id AND `deleted_at` is NULL";
        } else {
            $sql = "UPDATE posts SET"
                . " `publish` = 1, `published_at` = NOW()"
                . " WHERE `id` = :post_id AND `deleted_at` is NULL";
        }
        $data = $this->db->queryFirst($sql, [
            ':post_id' => $post_id,
        ]);
        return $data;
    }

    public function select_all() {
        $sql = "SELECT * FROM posts";
        $data = $this->db->queryAll($sql);
        return $data;
    }

    public function search_by_title($title) {
        $sql = "SELECT * FROM posts "
            . " WHERE `title` LIKE :title AND `deleted_at` is NULL AND `publish` = 1";
        $data = $this->db->queryAll($sql, [
            ':title' => '%'.$title.'%'
        ]);
        return $data;
    }

    public function select_by_post_id_week($post_id) {
        $sql = "SELECT * FROM posts "
            . " WHERE (`id` = :post_id AND `deleted_at` is NULL AND `publish` = 1 AND (`published_at` > DATE_SUB(now(), INTERVAL 7 DAY)))";
        $data = $this->db->queryFirst($sql. " LIMIT 1", [
            ':post_id' => $post_id
        ]);
        return $data;
    }

    public function select_by_post_id_month($post_id) {
        $sql = "SELECT * FROM posts "
            . " WHERE (`id` = :post_id AND `deleted_at` is NULL AND `publish` = 1 AND (`published_at` > DATE_SUB(now(), INTERVAL 30 DAY)))";
        $data = $this->db->queryFirst($sql. " LIMIT 1", [
            ':post_id' => $post_id
        ]);
        return $data;
    }

    public function select_by_post_id_year($post_id) {
        $sql = "SELECT * FROM posts "
            . " WHERE (`id` = :post_id AND `deleted_at` is NULL AND `publish` = 1 AND (`published_at` > DATE_SUB(now(), INTERVAL 365 DAY)))";
        $data = $this->db->queryFirst($sql. " LIMIT 1", [
            ':post_id' => $post_id
        ]);
        return $data;
    }

}