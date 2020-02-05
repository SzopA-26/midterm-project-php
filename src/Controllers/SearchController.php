<?php

namespace App\Controllers;
use App\Models\User;
use App\Models\Story;
use Exception;

class SearchController extends Controller
{
    public function story() {
        $input = $this->request->input;
        $title = $input->search_input;
        $posts = (new Story())->search_by_title($title);
        return $this->render('search/story',[
            'posts' => $posts,
            'search_input' => $title
        ]);
    }

    public function user() {
        // $input = $this->request->params[0];
        $input = $this->request->input;
        // var_dump($input);
        $username = $input->search_input;
        $users = (new User())->search_by_username($username);
        return $this->render('search/user',[
            'users' => $users,
            'search_input' => $username
        ]);
    }

    // public function index() {
    //     $input = $this->request->input;
    //     return $this->redirect('search/user',)
    // }
}