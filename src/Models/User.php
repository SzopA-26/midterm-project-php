<?php

namespace App\Models;
use App\Models\Story;
use App\Models\View;

class User extends Model
{
    public function insert($username, $email, $password, $birthdate, $gender) {
        $sql = "INSERT INTO users (`username`, `email`, `password`, `created_at`, `updated_at`, `birthdate`, `gender`) "
                ." VALUES(:username, :email, :password, NOW(), NOW(), :birthdate, :gender)";
        $data = $this->db->queryAll($sql ,[
            ':username' => $username,
            ':email' => $email,
            ':password' => $password,
            ':birthdate' => $birthdate. ' 00:00:00',
            ':gender' => $gender
        ]);
        return $data;
    }

    public function update_username($old_username, $new_username) {
        $sql = "UPDATE users SET"
            . " `username` = :new_username,"
            . " `updated_at` = NOW()"
            . " WHERE `username` = :old_username";
        $data = $this->db->queryFirst($sql, [
            ':old_username' => $old_username,
            ':new_username' => $new_username
        ]);
        return $data;
    }

    public function update_password($password, $username) {
        $sql = "UPDATE users SET"
            . " `password` = :password,"
            . " `updated_at` = NOW()"
            . " WHERE `username` = :username";
        $data = $this->db->queryFirst($sql, [
            ':password' => $password,
            ':username' => $username
        ]);
        return $data;
    }

    public function select_by_email($email) {
        $sql = "SELECT * FROM users"
            . " WHERE `email` = :email" . " LIMIT 1";
        $data = $this->db->queryFirst($sql, [
            ':email' => $email
        ]);
        return $data;
    }

    public function select_by_username($username) {
        $sql = "SELECT * FROM users"
            . " WHERE username = :username";
        $data = $this->db->queryFirst($sql . " LIMIT 1", [
            ':username' => $username
        ]);
        return $data;
    }

    public function select_by_user_id($user_id) {
        $sql = "SELECT * FROM users"
            . " WHERE id = :user_id";
        $data = $this->db->queryFirst($sql . " LIMIT 1", [
            ':user_id' => $user_id
        ]);
        return $data;
    }

    public function get_total_views($username) {
        $user = (new User())->select_by_username($username);
        $posts = (new Story())->select_by_user_id($user->id);
        $views = 0;
        foreach ($posts as $post) {
            $views += (new View())->get_post_view_count($post->id);
        }
        return $views;
    }

    public function get_total_posts($username) {
        $user = (new User())->select_by_username($username);
        $posts = (new Story())->select_by_user_id($user->id);
        return count($posts);
    }

    public function search_by_username($username) {
        $sql = "SELECT * FROM users "
            . " WHERE `username` LIKE :username";
        $data = $this->db->queryAll($sql, [
            ':username' => '%'.$username.'%'
        ]);
        return $data;
    }
}