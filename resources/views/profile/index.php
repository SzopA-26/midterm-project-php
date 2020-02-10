<?php $this->layout('layouts/app', ['tab' => 'profile']) ?>
<?php

use App\Framework\Utilities\Session;

$auth = Session::read('Auth');

?>

<div class="row">
    <div class="col-4 text-center">
        <div class="card">
            <div class="card-body">
                <figure class="figure">
                    <img src="../../img/icon-profile.png" class="figure-img img-fluid rounded" alt="...">
                    <!-- <figcaption class="figure-caption">A caption for the above image.</figcaption> -->
                </figure>
                <h4>
                    <?= $username ?>
                </h4>
                <?php if ($auth['role'] == 'admin') : ?>
                    <div>
                        status: 
                        <?php if ($user->ban == 0) : ?>
                            <span style="color: green">ACTIVE</span>
                        <?php else : ?>
                            <span style="color: red">BANNED</span>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <?php if ($auth['role'] == 'admin' && $username != 'admin') : ?>
            <a type="button" class="btn btn-outline" id="edit-btn" href="/users/ban/<?= $user->username ?>" style="margin-top: 0px;margin-bottom: 0px;">
                <strong>
                    <?php if ($user->ban == 0) : ?>
                        BAN
                    <?php else : ?>
                        UNBAN
                    <?php endif; ?>
                </strong>
            </a>
        <?php endif; ?>

        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <figcaption class="figure-caption">STORIES</figcaption>
                        <h5><?= $stories ?></h5>
                    </div>
                    <div class="col">
                        <figcaption class="figure-caption">VIEWS</figcaption>
                        <h5><?= $views ?></h5>
                    </div>
                    <div class="col">
                        <figcaption class="figure-caption">GIFT</figcaption>
                        <h5><?= $gifts ?></h5>
                        </h4>
                    </div>
                </div>
            </div>
        </div>
        
        <?php if ($auth['username'] == $username) : ?>
            <a type="button" class="btn btn-outline" id="edit-btn" href="/profile/edit"><strong>EDIT</strong></a>
        <?php else : ?>
            <div class="row">
                <!-- <div class="col-6">
                    <a type="button" class="btn btn-primary" id="follow-btn"><strong>FOLLOW</strong></a>
                </div> -->
                <div class="col">
                    <a type="button" class="btn btn-outline-primary" id="gift-btn" data-toggle="modal" data-target="#gift-modal"><span><strong>GIFT </strong></span><i class="fa fa-gift"></i></a>
                </div>
            </div>

            <!-- Modal gift-->
            <div class="modal" id="gift-modal" role="dialog">
                <div class="modal-dialog modal-m">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="container">
                            <div class="modal-header">
                                <div class="container">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <div class="container">
                                        <h3 id="header-login" style="text-align:center" class="modal-title">Send gift for support</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-body">
                            </div>

                            <form action="/profile/sendgift" method="post">
                                <input type="hidden" name="value" value="0" id="gift">
                                <input type="hidden" name="username" value="<?= $username ?>">
                                <div class="container">
                                    <button type="button" id="g50-btn" class="btn btn-outline-secondary"><i class="fa fa-gift"></i> 50</button>
                                    <button type="button" id="g100-btn" class="btn btn-outline-secondary"><i class="fa fa-gift"></i> 100</button>
                                    <button type="button" id="g500-btn" class="btn btn-outline-secondary"><i class="fa fa-gift"></i> 500</button>
                                    <button type="button" id="g1000-btn" class="btn btn-outline-secondary"><i class="fa fa-gift"></i> 1000</button>
                                </div>
                                <br>
                                <div class="modal-footer">
                                    <button class="btn btn-outline-info border-left-0 border" type="submit" onclick="">Submit
                                        <span class="fa fa-check"></span>
                                    </button>
                                    <button class="btn btn-outline-danger border-left-0 border" type="submit" data-dismiss="modal">Cancel
                                        <span class="fa fa-times"></span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>


    </div>

    <div class="col-8">
        <ul class="nav nav-tabs" id="link-tab">
            <li class="nav-item">
                <a class="nav-link active" href="/profile/user/<?= $username ?>">Story</a>
            </li>
            <?php if ($auth['role'] == 'admin') : ?>
                <li class="nav-item">
                    <a class="nav-link" href="/profile/draft/<?= $username ?>">Draft</a>
                </li>
            <?php endif; ?>
        </ul>
        <?php foreach ($posts as $post) : ?>

            <div class="card">
                <div class="card-body">
                    <a href="/stories/post/<?= $post->id ?>">
                        <h3><?= $post->title ?></h3>
                    </a>
                    <figcaption class="figure-caption">
                        updated on <?= $post->updated_at ?>
                        <?php if ($auth['role'] == 'admin' || $auth['username'] == $username) : ?>
                            <span class="dropdown">
                                <a href="#" class="dropdown-toggle " data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="caret"></span></a>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <?php if (($auth['username'] == $username && $auth['role'] != 'admin' ) || ($username == 'admin' && $auth['role'] == 'admin' )) : ?>
                                        <li><a class="dropdown-item" href="/stories/edit/<?= $post->id ?>">Edit</a></li>
                                    <?php endif; ?>
                                    <li><a class="dropdown-item" href="/stories/delete/<?= $post->id ?>">Delete</a></li>
                                    <li><a class="dropdown-item" href="/stories/unpublish/<?= $post->id ?>">Unpublish</a></li>
                                </ul>
                            </span>
                        <?php endif; ?>
                    </figcaption>
                </div>
            </div>

        <?php endforeach; ?>
    </div>
</div>