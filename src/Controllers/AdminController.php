<?php

namespace App\Controllers;

use App\Models\Gift;
use App\Models\Story;
use App\Models\View;
use App\Models\User;
use App\Framework\Utilities\Session;
use Exception;

class AdminController extends Controller
{

    public function index() {
        $this->dashboard();
    }

    public function dashboard()
    {
        $auth = Session::read('Auth');
        if (!$auth || $auth['role'] != 'admin') {
            return 'You not have permission to access.';
        }
        $posts = (new Story())->select_all();
        foreach ($posts as $post) {
            $views[$post->id] = (new View())->get_post_view_count($post->id);
        }
        arsort($views);

        $d = 0;
        $m = 0;
        $y = 0;
        foreach ($views as $post_id => $view) {
            if ($d > 5 && $m > 5 && $y > 5) {
                break;
            }
            if ((new Story())->select_by_post_id_week($post_id)) {
                $weekly_posts[$d] = (new Story())->select_by_post_id_join_users($post_id);
                $d++;
            }
            if ((new Story())->select_by_post_id_month($post_id)) {
                $monthly_posts[$m] = (new Story())->select_by_post_id_join_users($post_id);
                $m++;
            }
            if ((new Story())->select_by_post_id_year($post_id)) {
                $yearly_posts[$y] = (new Story())->select_by_post_id_join_users($post_id);
                $y++;
            }
        }

        $users = (new User())->select_all();
        foreach ($users as $user) {
            $gifts_arr[$user->id] = 0;
            $gifts = (new Gift())->select_gift_by_user_id($user->id);
            foreach ($gifts as $gift) {
                $gifts_arr[$user->id] += $gift->value;
            }
        }
        arsort($gifts_arr);

        // $g =(new Gift())->select_gift_by_user_id_week(7);
        // echo '<pre>';
        // var_dump($g);
        // echo '</pre>';
        foreach ($gifts_arr as $user_id => $value) {
            if ((new Gift())->select_gift_by_user_id_week($user_id)) {
                $user = (new User())->select_by_user_id($user_id);
                $weekly_gifts[$user->username] = $value;
            }
            if ((new Gift())->select_gift_by_user_id_month($user_id)) {
                $user = (new User())->select_by_user_id($user_id);
                $monthly_gifts[$user->username] = $value;
            }
            if ((new Gift())->select_gift_by_user_id_year($user_id)) {
                $user = (new User())->select_by_user_id($user_id);
                $yearly_gifts[$user->username] = $value;
            }
        }


        $x = 0;
        while ($x < 12) {
            $posts_in_year[$x] = (new Story())->count_post_by_published_of_month($x);

            $gift_per_month = 0;
            $gifts_of_month = (new Gift())->select_gift_by_month($x);
            foreach ($gifts_of_month as $gift) {
                $gift_per_month += $gift->value;
            }
            $gifts_in_year[$x] = $gift_per_month;

            $x++;
        }



        return $this->render('admin/dashboard', [
            'weekly_posts' => $weekly_posts,
            'monthly_posts' =>  $monthly_posts,
            'yearly_posts' => $yearly_posts,
            'views' => $views,
            'weekly_gifts' => $weekly_gifts,
            'monthly_gifts' =>  $monthly_gifts,
            'yearly_gifts' => $yearly_gifts,
            'posts_in_year' => $posts_in_year,
            'gifts_in_year' => $gifts_in_year
        ]);
    }

    public function users()
    {
        $auth = Session::read('Auth');
        if (!$auth || $auth['role'] != 'admin') {
            return 'You not have permission to access.';
        }
        $users = (new User())->select_all_order_by_ban();
        $i = 0;
        foreach ($users as $user) {
            $gifts = (new Gift())->select_gift_by_user_id($user->id);
            $point = 0;
            foreach ($gifts as $gift) {
                $point += $gift->value;
            }
            $posts = (new Story())->select_by_user_id_all($user->id);
            $total_views = 0;
            foreach ($posts as $post) {
                $total_views += (new View())->get_post_view_count($post->id);
            }
            $user_list[$i] = [
                'user_info' => $user,
                'total_post' => $total_post = count($posts),
                'point' => $point,
                'total_view' => $total_views
            ];
            $i++;
        } 

        // echo "<pre>";
        // var_dump($users);
        // var_dump($user_list);
        // echo "</pre>";
        return $this->render('admin/users',[
            'user_list' => $user_list
        ]);
    }
}
