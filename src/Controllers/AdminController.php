<?php

namespace App\Controllers;
use App\Models\Admin;
use Exception;

class AdminController extends Controller
{
    public function index() {
        return $this->render('admin/index');
    }

    public function dashboard() {
        return $this->render('admin/dashboard');
    }

    public function users() {
        return $this->render('admin/users');
    }
}