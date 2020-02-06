<?php

namespace App\Models;

class Gift extends Model
{
    public function insert($user_id, $send_user_id, $value) {
        $sql = "INSERT INTO gifts (`user_id`, `send_user_id`, `value`)"
            . " VALUES(:user_id, :send_user_id, :value)";
        $data = $this->db->queryFirst($sql, [
            ':user_id' => $user_id,
            ':send_user_id' => $send_user_id,
            ':value' => $value
        ]);
        return $data;
    } 

    public function select_gift_by_user_id($user_id) {
        $sql = "SELECT * FROM gifts"
            . " WHERE `user_id` = :user_id";
        $data = $this->db->queryAll($sql, [
            ':user_id' => $user_id
        ]);
        return $data;
    }

    public function select_send_by_user_id($user_id) {
        $sql = "SELECT * FROM gifts"
            . " WHERE `send_user_id` = :user_id";
        $data = $this->db->queryAll($sql, [
            ':send_user_id' => $user_id
        ]);
        return $data;
    }
    

}