<?php

namespace App\Models;

class Follow extends Model
{
    public function insert($user_id, $follower_user_id) {
        $sql = "INSERT INTO follows (`user_id`, `follower_user_id`)"
            . " VALUES(:user_id, :follower_user_id)";
        $data = $this->db->queryFirst($sql, [
            ':user_id' => $user_id,
            ':follower_user_id' => $follower_user_id
        ]);
        return $data;
    } 

    public function delete($user_id, $follower_user_id) {
        $sql = "DELETE FROM follows"
            . " WHERE (`user_id` = :user_id AND `follower_user_id` = :follower_user_id";
        $data = $this->db->queryFirst($sql, [
            ':user_id' => $user_id,
            ':follower_user_id' => $follower_user_id
        ]);
        return $data;
    }

    public function select_follower_by_username($username) {
        $sql = "SELECT * FROM follows"
            . " WHERE `user_following` = :username";
        $data = $this->db->queryAll($sql, [
            ':username' => $username
        ]);
        return $data;
    }

    public function select_following_by_username($username) {
        $sql = "SELECT * FROM follows"
            . " WHERE `user_follower` = :username";
        $data = $this->db->queryAll($sql, [
            ':username' => $username
        ]);
        return $data;
    }
    

}