<?php

namespace App\Controllers;
use App\Models\Profile;
use Exception;

class HomeController extends Controller
{
    public function index() {
        return $this->render('home/index');
    }
}