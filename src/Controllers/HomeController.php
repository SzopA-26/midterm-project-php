<?php

namespace App\Controllers;
use Exception;

class HomeController extends Controller
{
    public function index() {
        return $this->render('home/index');
    }
}