<?php $this->layout('layouts/app', ['tab' => 'post']) ?>
<?php

use App\Framework\Utilities\Session;
use App\Models\Comment;

$auth = Session::read('Auth');
?>

<!-- post -->
<div class="container">
    <h1>POST</h1>
    <div class="card" style="margin-top: 20px; margin-bottom: 20px;">
        <div class="container" style="margin-top: 10px; margin-bottom: 10px;">
            <div class="row">
                <div class="col-2" style="text-align: center;">
                    <img src="../../img/icon-profile.png" width="140" height="140">
                    <br>
                    <br>
                    <div><?= $auth['username'] ?></div>
                </div>
                <div class="col">
                    <div class="card-header">
                        <div style="font-size: 130%;"><?= $post->title ?></div>
                    </div>
                    <div class="card-body">
                        <div><?= $post->content ?></div>

                    </div>
                    <div class="card-footer text-muted">

                        <span style="font-size: 90%;"><?= $post->updated_at ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- comment -->
    <div class="container">
        <form action="/stories/comment" method="post">
            <div class="row">
                <div class="col-1"></div>
                <div class="col-10" style="text-align: right;">
                    <input type="hidden" name="post_id" value="<?= $post->id ?>">
                    <textarea style="margin-bottom: 15px;" class="form-control" rows="3" id="comment" placeholder="comment" name="content"></textarea>
                    <button type="submit" class="btn btn-outline-primary"><i class="fa fa-comments"></i></i>
                        Comment</button>

                </div>
                <div class="col-1"></div>

            </div>
        </form>

    </div>

    <!-- all comment -->
    <div class="container">
        <div class="row">
            <div class="col-1"></div>
            <div class="col-10">

                <?php $count = 1 ?>
                <?php foreach ($comments as $comment) : ?>


                    <div class="card" style="margin-top: 20px; margin-bottom: 20px;">
                        <div class="container" style="margin-top: 10px; margin-bottom: 10px;">
                            <div class="row">

                                <div class="col-2" style="text-align: center;">
                                    <img src="../../img/icon-profile.png" width="90" height="90">
                                    <br>
                                    <br>
                                    <div><?= $comment->username ?> </div>
                                </div>
                                <div class="col">
                                    <div class="card-header">
                                        <div style="font-size: 130%;">Comment <?= $count++ ?></div>
                                    </div>
                                    <div class="card-body">
                                        <div><?= $comment->content ?></div>
                                    </div>
                                    <div class="card-footer text-muted">

                                        <span style="font-size: 90%;"><?= $comment->created_at ?></span>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                <?php endforeach; ?>
            </div>

            <div class="col-1"></div>
        </div>
    </div>
</div>