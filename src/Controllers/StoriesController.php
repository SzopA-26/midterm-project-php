<?php

namespace App\Controllers;
use App\Models\Story;
use Exception;

class StoriesController extends Controller
{
    public function draft() {
        return $this->render('stories/draft');
    }

    public function published() {
        return $this->render('stories/published');
    }

    public function write() {
        return $this->render('stories/write');
    }
}