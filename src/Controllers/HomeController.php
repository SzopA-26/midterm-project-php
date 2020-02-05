<?php

namespace App\Controllers;
use App\Models\Story;
use App\Models\View;
use Exception;

class HomeController extends Controller
{
    public function index() {
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
                $trends[$i] = (new Story())->select_by_post_id($post_id);
                $i++;
            }
        }
        
        $posts_new = (new Story())->select_by_new(8);
        return $this->render('home/index',[
            'posts' => $posts_new,
            'trends' => $trends
        ]);
    }

    
}