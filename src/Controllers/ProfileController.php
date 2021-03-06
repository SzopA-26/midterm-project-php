<?php

namespace App\Controllers;

use App\Framework\Utilities\Session;
use App\Models\User;
use App\Models\Story;
use App\Models\Gift;

class ProfileController extends Controller {

    public function user() {        
        $auth = Session::read('Auth');
        $username = $this->request->params[0];
        if (!$username) {
            $username = $auth['username'];
        }
        $user = (new User())->select_by_username($username);
        $gifts = (new Gift())->select_gift_by_user_id($user->id);
        $point = 0;
        foreach ($gifts as $gift) {
            $point += $gift->value;
        }
        return $this->render('profile/index' , [
            'user' => $user,
            'username' => $user->username,
            'stories' => (new User())->get_total_posts($user->username),
            'gifts' => $point,
            'posts' => (new Story())->select_by_user_id($user->id),
            'views' => (new User())->get_total_views($user->username)
        ]);
    }

    // public function activities() {        
    //     $auth = Session::read('Auth');
    //     $username = $this->request->params[0];
    //     if (!$username) {
    //         $username = $auth['username'];
    //     }
    //     $user = (new User())->select_by_username($username);
    //     return $this->render('profile/activities' , [
    //         'username' => $user->username,
    //         'stories' => (new User())->get_total_posts($user->username),
    //         'views' => (new User())->get_total_views($user->username),
    //         'followers' => count((new Follow())->select_follower_by_user_id($user->id)),
    //         'posts' => (new Story())->select_by_user_id($user->id)
    //     ]);
    // }

    public function edit() {
        $auth = Session::read('Auth');
        $user = (new User())->select_by_username($auth['username']);
        $gifts = (new Gift())->select_gift_by_user_id($user->id);
        $point = 0;
        foreach ($gifts as $gift) {
            $point += $gift->value;
        }
        return $this->render('profile/edit' , [
            'username' => $user->username,
            'stories' => (new User())->get_total_posts($user->username),
            'gifts' => $point,
            'views' => (new User())->get_total_views($user->username),
        ]);
    }

    public function changeusername() {
        $auth = Session::read('Auth');
        $input = $this->request->input;
        $user = (new User())->select_by_username($input->username);
        $userlogin = (new User())->select_by_username($auth['username']);
        if ( !password_verify($input->c_password, $userlogin->password)) {   
            echo "<script>alert('password is incorrect.')</script>";
        } else if ($user) {
            echo "<script>alert('username already exist.')</script>";
        } else {
            (new User())->update_username($auth['username'], $input->username);
            $user = (new User())->select_by_username($input->username);
            Session::destroy();
            Session::write('Auth', [
                'id' => $user->id,
                'username' => $user->username,
                'role' => $user->role
            ]);
            echo "<script>alert('username change success.')</script>";
        }
        echo "<script>window.location.href='/profile/edit';</script>";
    }

    public function changepassword() {
        $auth = Session::read('Auth');
        $input = $this->request->input;
        $userlogin = (new User())->select_by_username($auth['username']);
        if ( !password_verify($input->old_password, $userlogin->password)) {   
            echo "<script>alert('password is incorrect.')</script>";
        } else if ( $input->new_password != $input->c_password) {
            echo "<script>alert('password doesn't macth.')</script>";
        } else {
            $hash = password_hash($input->new_password, PASSWORD_DEFAULT);
            (new User())->update_password($hash, $auth['username']);
            echo "<script>alert('password change success')</script>";
        }
        echo "<script>window.location.href='/profile/edit';</script>";
    }

    public function sendgift(){
        $auth = Session::read('Auth');
        $input = $this->request->input;
        $user = (new User())->select_by_username($input->username);
        (new Gift())->insert($user->id, $auth['id'], $input->value);
        $gifts = (new Gift())->select_gift_by_user_id($user->id);
        $point = 0;
        foreach ($gifts as $gift) {
            $point += $gift->value;
        }
        return $this->redirect('profile/user/'.$user->username );
    }

    public function draft() {
        $auth = Session::read('Auth');
        $username = $this->request->params[0];
        if ($auth['role'] != 'admin') {
            echo "<script>alert('you not have permission')</script>";
            echo "<script>window.location.href='/';</script>";
        } else {
            $user = (new User())->select_by_username($username);
            $drafts = (new Story())->select_draft_by_user_id($user->id);
            $gifts = (new Gift())->select_gift_by_user_id($user->id);
            $point = 0;
            foreach ($gifts as $gift) {
                $point += $gift->value;
            }
            return $this->render('profile/draft' , [
                'user' => $user,
                'username' => $user->username,
                'stories' => (new User())->get_total_posts($user->username),
                'views' => (new User())->get_total_views($user->username),
                'gifts' => $point,
                'posts' => $drafts
            ]);
        }
    }

    

}
