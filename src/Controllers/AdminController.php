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

        $d = 0; $m=0; $y=0; 
        foreach ($views as $post_id => $view) {
            if ($d > 5 && $m > 5 && $y>5) {
                break;
            } 
            if ((new Story())->select_by_post_id_date($post_id)) {
                $daily_posts[$d] = (new Story())->select_by_post_id_join_users($post_id);
                $d++;
            }
            if ((new Story())->select_by_post_id_month($post_id)) {
                $month_posts[$m] = (new Story())->select_by_post_id_join_users($post_id);
                $m++;
            }
            if ((new Story())->select_by_post_id_year($post_id)) {
                $year_posts[$y] = (new Story())->select_by_post_id_join_users($post_id);
                $y++;
            }
        }
        $x=0;
        while($x<12){
            $posts_in_year[$x++] =(new Story())->count_post_by_published_of_month($x); 
        }
        return $this->render('admin/dashboard',[
            'daily_posts' => $daily_posts ,
            'month_posts' =>  $month_posts,
            'year_posts' => $year_posts,
            'views' => $views,
            'posts_in_year' => $posts_in_year
        ]);
    }

    public function users() {
        return $this->render('admin/users');
    }
}