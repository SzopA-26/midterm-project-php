<?php

namespace App\Controllers;

use App\Framework\Utilities\Session;
use App\Models\Story;
use App\Models\User;
use App\Models\View;
use App\Models\Comment;

use Exception;

class StoriesController extends Controller
{
    public function index() {
        return $this->redirect('stories/draft');
    }

    public function draft() {
        $auth = Session::read('Auth');
        $drafts = (new Story())->select_draft_by_user_id($auth['id']);
        $publisheds = (new Story())->select_published_by_user_id($auth['id']);
        return $this->render('stories/draft', [
            'drafts' => $drafts,
            'publisheds' => $publisheds
        ]);
    }

    public function published() {
        $auth = Session::read('Auth');
        $drafts = (new Story())->select_draft_by_user_id($auth['id']);
        $publisheds = (new Story())->select_published_by_user_id($auth['id']);
        return $this->render('stories/published', [
            'drafts' => $drafts,
            'publisheds' => $publisheds
        ]);
    }

    public function write() {
        return $this->render('stories/write', [
            'title' => "",
            'content' => "",
            'type' => 'new',
            'post_id' => 0
        ]);
    }

    public function edit() {
        $post_id = $this->request->params[0];
        $post = (new Story())->select_all_by_id($post_id);
         return $this->render('stories/write', [
            'title' => $post->title,
            'content' => $post->content,
            'type' => 'update',
            'post_id' => $post->id
        ]);
    }

    public function delete() {
        $auth = Session::read('Auth');
        $post_id = $this->request->params[0];
        $post = (new Story())->select_by_post_id($post_id);
        $user = (new User())->select_by_user_id($post->user_id);
        $post = (new Story())->delete($post_id);
        if ($auth['role'] == 'admin') {
            return $this->redirect('/profile/user/'.$user->username);
        } else {
            echo "<script>window.location.href='/stories/draft';</script>";
        }
    }

    public function publish() {
        $auth = Session::read('Auth');
        $post_id = $this->request->params[0];
        $post = (new Story())->select_all_by_id($post_id);
        $user = (new User())->select_by_user_id($post->user_id);

        (new Story())->update_publish($post_id);
        if ($auth['role'] == 'admin' && $user->username != $auth['username']) {
            return $this->redirect('/profile/user/'.$user->username);
        } else {
            echo "<script>window.location.href='/stories/draft';</script>";
        }
    }

    public function unpublish() {
        $auth = Session::read('Auth');
        $post_id = $this->request->params[0];
        $post = (new Story())->select_by_post_id($post_id);
        $user = (new User())->select_by_user_id($post->user_id);
        (new Story())->update_publish($post_id);
        if ($auth['role'] == 'admin' && $user->username != $auth['username']) {
            return $this->redirect('/profile/user/'.$user->username);
        } else {
            echo "<script>window.location.href='/stories/published';</script>";
        }
    }

    public function save_draft() {
        $auth = Session::read('Auth');
        $input = $this->request->input;
        if (!$input->title) {
            return 'faillll';
        }
        $total_posts = count((new Story())->select_by_user_id_all($auth['id']));
        // var_dump($input->title);
        // var_dump($input->content);
        // var_dump($auth['id']);
        // var_dump($total_posts);
        
        (new Story())->insert($input->title, $input->content, $auth['id']);
        if ($total_posts == count((new Story())->select_by_user_id_all($auth['id']))) {
            return 'fail';
        } return 'success';
    }

    public function update() {
        $input = $this->request->input;
        (new Story())->update($input->title, $input->content, $input->post_id);
        return 'success';
    }

    public function post(){
        $auth = Session::read('Auth');
        $post_id = $this->request->params[0];
        $post = (new Story())->select_by_post_id($post_id);

        // echo '<pre>';
        // var_dump($post);
        // echo '</pre>';
        $user = (new User())->select_by_user_id($post->user_id);
        $comments =(new Comment())->select_by_post_id_join_users($post_id);
        if ($post->publish == 1 && $user->username != $auth['username']) {
            (new View())->insert($auth['id'], $post_id);
        }
        
        return $this->render('stories/post', [
            'post' => $post,
            'comments' => $comments,
            'username' => $user->username
        ]);

    }

    public function comment(){
        $auth = Session::read('Auth');
        $input = $this->request->input;
        $content = $input->content;
        $post_id = $input->post_id;

        $comments =(new Comment())->insert($content,$post_id,$auth['id']);
        $post = (new Story())->select_by_post_id($post_id);

        return $this->redirect('stories/post/'.$post_id, [
            'post' => $post,
            'comments' => $comments

        ]);

    }
    

}