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
}