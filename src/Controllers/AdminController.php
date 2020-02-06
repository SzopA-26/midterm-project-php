<?php

namespace App\Controllers;
use App\Models\Admin;
use App\Models\Story;
use App\Models\View;
use App\Models\User;
use Exception;

class AdminController extends Controller
{
    public function index() {
       
    }

    public function dashboard() {
        $posts = (new Story())->select_all();
        foreach ($posts as $post) {
            $views[$post->id] = (new View())->get_post_view_count($post->id);
        }
        arsort($views);

        $i = 0;
        foreach ($views as $post_id => $view) {
            if ($i > 5) {
                break;
            } 
            if ((new Story())->select_by_post_id($post_id)) {
                $posts[$i] = (new Story())->select_by_post_id_join_users($post_id);
                $i++;
            }
        }
        return $this->render('admin/dashboard',[
            'daily_posts' => $posts ,
            'daily_views' => $views
        ]);
    }

    public function users() {
        return $this->render('admin/users');
    }
}