<?php

namespace App\Controllers;

use App\Framework\Utilities\Session;
use App\Models\User;
use Exception;

class UsersController extends Controller
{
    public function index()
    {
        $users = (new User())->all();
        return $this->render('users/index', ['users' => $users]);
    }

    public function show()
    {
        if (!isset($this->request->params[0])) {
            throw new Exception('Data Not Found');
        }
        $id = $this->request->params[0];
        $user = (new User())->first($id);
        return $this->render('users/show', ['user' => $user]);
    }

    public function create() {
        $input = $this->request->input;
        $username = $input->username;
        $email = $input->email;
        $password = $input->password;
        $c_password = $input->c_password;
        $birthdate = $input->birthdate;
        $gender = $input->gender;

        if (!$username or !$email or !$password or !$c_password or !$birthdate) {
            echo "<script>alert('Please enter your information.')</script>";
        } else if (($user = (new User())->select_by_username($username))) {
            echo "<script>alert('username already exist.')</script>";
        } else if (($user = (new User())->select_by_email($email))) {
            echo "<script>alert('email already exist.')</script>";
        } else if ($password != $c_password) {
            echo "<script>alert('password doesn't macth.')</script>";
        } else if (strlen($username)<6) {
            echo "<script>alert('username must contain at least 6 characters.')</script>";
        } else if (strlen($password)<6) {
            echo "<script>alert('password must contain at least 6 characters.')</script>";
        } else {
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $user = (new User())->insert($username, $email, $hash, $birthdate, $gender);
            echo "<script>alert('sign up success.')</script>";
            // var_dump($user);
            // var_dump($_POST['username']);
        }

        echo "<script>window.location.href='/';</script>";

    }

    public function sessionSet() {
        Session::write('user_id', 1);
        return $this->render('users/sessionSet');
    }

    public function sessionGet() {
        return $this->render('users/sessionGet');
    }

    public function authen() {
        $input = $this->request->input;
        $email = $input->email;
        $password = $input->password;

        $user = (new User())->select_by_email($email);

        if ($user && password_verify($password, $user->password)) {
            Session::write('Auth', [
                'id' => $user->id,
                'username' => $user->username,
                'role' => $user->role
            ]);


            return $this->redirect('/');
        } else {
            echo "<script>alert('incorrect username or password.')</script>";
        }
    }

    public function authorize() {
        $auth = Session::read('Auth');

        if (!$auth or $auth['role'] != 'Admin') {
            return 'You have no permission';
        }
        return $this->render('users/sessionGet');
    }

    public function logout() {
        Session::destroy();
        $this->redirect('/');
    }
}