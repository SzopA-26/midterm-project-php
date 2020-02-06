<?php

namespace App\Models;
use App\Models\User;


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

    public function select_all_users() {
        $sql = "SELECT `gifts`.*,`users`.`username`, `users`.`ban` FROM gifts join users on `gifts`.`user_id` = `users`.`id`"
            . " WHERE `users`.`ban` = 0 ";
        $data = $this->db->queryAll($sql);
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
    
    public function select_gift_by_user_id_week($user_id) {
        $sql = "SELECT * FROM gifts"
            . " WHERE `user_id` = :user_id AND (`created_at` > DATE_SUB(now(), INTERVAL 7 DAY))";
        $data = $this->db->queryAll($sql, [
            ':user_id' => $user_id
        ]);
        return $data;
    }

    public function select_gift_by_user_id_month($user_id) {
        $sql = "SELECT * FROM gifts "
            . " WHERE (`user_id` = :user_id AND (`created_at` > DATE_SUB(now(), INTERVAL 30 DAY)))";
        $data = $this->db->queryAll($sql, [
            ':user_id' => $user_id
        ]);
        return $data;
    }

    public function select_gift_by_user_id_year($user_id) {
        $sql = "SELECT * FROM gifts "
            . " WHERE (`user_id` = :user_id AND (`created_at` > DATE_SUB(now(), INTERVAL 365 DAY)))";
        $data = $this->db->queryAll($sql, [
            ':user_id' => $user_id
        ]);
        return $data;
    }

    public function select_gift_by_month($m) {
        $sql = "SELECT * FROM gifts "
            ." WHERE MONTH(`created_at`) = :m";
        $data = $this->db->queryAll($sql, [
            ':m' => $m
        ]);
        return $data;
    }

}