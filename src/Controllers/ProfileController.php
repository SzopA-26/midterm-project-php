<?php

namespace App\Controllers;
use App\Models\Profile;
use Exception;

class ProfileController extends Controller {

    public function index() {        
        $user_id = 1;
        return $this->render('profile/index', ['user_id' => $user_id]);
    }
}
