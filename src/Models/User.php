<?php

namespace App\Models;

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

}