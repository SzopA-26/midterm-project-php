<?php

namespace App\Controllers;

use App\Framework\Utilities\Session;
use App\Models\User;
use App\Models\Follow;
use App\Models\Story;

use Exception;

class ProfileController extends Controller {

    public function user() {        
        $auth = Session::read('Auth');
        $username = $this->request->params[0];
        if (!$username) {
            $username = $auth['username'];
        }
        $user = (new User())->select_by_username($username);
        return $this->render('profile/index' , [
            'username' => $user->username,
            'stories' => (new User())->get_total_posts($user->username),
            'views' => (new User())->get_total_views($user->username),
            'followers' => count((new Follow())->select_follower_by_user_id($user->id))
        ]);
    }

}
