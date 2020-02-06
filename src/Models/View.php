<?php

namespace App\Models;

class View extends Model {

    public function get_post_view_count($post_id) {
        $sql = "SELECT * FROM views"
            . " WHERE `post_id` = :post_id";
        $data = $this->db->queryAll($sql, [
            ':post_id' => $post_id
        ]);
        return count($data);
    }

    public function insert($user_id, $post_id) {
        $sql = "INSERT INTO views (`user_id`, `post_id`)"
        . " VALUES(:user_id, :post_id)";
    $data = $this->db->queryFirst($sql, [
        ':user_id' => $user_id,
        ':post_id' => $post_id
    ]);
    return $data;
    }


}