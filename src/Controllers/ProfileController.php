<?php

namespace App\Controllers;

use App\Framework\Utilities\Session;
use App\Models\User;
use Exception;

class ProfileController extends Controller {

    public function index() {        
        $auth = Session::read('Auth');
        return $this->render('profile/index' , ['auth' => $auth]);
    }

}
