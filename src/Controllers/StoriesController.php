<?php

namespace App\Controllers;

use App\Framework\Utilities\Session;
use App\Models\Story;
use App\Models\User;
use App\Models\Follow;
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
        $post = (new Story())->select_by_post_id($post_id);
         return $this->render('stories/write', [
            'title' => $post->title,
            'content' => $post->content,
            'type' => 'update',
            'post_id' => $post->id
        ]);
    }

    public function delete() {
        $post_id = $this->request->params[0];
        $post = (new Story())->delete($post_id);
        echo "<script>window.location.href='/stories/draft';</script>";
    }

    public function publish() {
        $post_id = $this->request->params[0];
        $post = (new Story())->update_publish($post_id);
        echo "<script>window.location.href='/stories/draft';</script>";
    }

    public function unpublish() {
        $post_id = $this->request->params[0];
        $post = (new Story())->update_publish($post_id);
        echo "<script>window.location.href='/stories/published';</script>";
    }

    public function save_draft() {
        $auth = Session::read('Auth');
        $input = $this->request->input;
        if (!$input->title) {
            return 'fail';
        }
        $total_posts = count((new Story())->select_by_user_id($auth['id']));
        // return $input->title . " " . $input->content;
        (new Story())->insert($input->title, $input->content, $auth['id']);
        if ($total_posts == count((new Story())->select_by_user_id($auth['id']))) {
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
        $comments =(new Comment())->select_by_post_id($post_id);

        return $this->render('stories/post', [
            'post' => $post,
            'comments' => $comments

            // 'title' => $post->title,
            // 'content' => $post->content,
            // 'type' => 'update',
            // 'post_id' => $post->id
        ]);

    }
    

}