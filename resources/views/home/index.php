<?php $this->layout('layouts/app', ['tab' => 'home']) ?>
<?php

use App\Framework\Utilities\Session;
use App\Models\Comment;

$auth = Session::read('Auth');
?>


<div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
        <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="../../img/book-try.jpg" class="d-block w-100" alt="..." width="500" height="500">
            <div class="carousel-caption d-none d-md-block">
                <h5>Welcome to JAU</h5>
                <p style="color: black">This web is about story. You can try to read some stories or write some stories </p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="../../img/book-try-2.jpg" class="d-block w-100" alt="..." width="500" height="500">
            <div class="carousel-caption d-none d-md-block">
                <h5>Write amazing stories if you want to be a great writer</h5>
                <p style="color: black">You can write everything you want but not impolite</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="../../img/book-try-3.jpg" class="d-block w-100" alt="..." width="500" height="500">
            <div class="carousel-caption d-none d-md-block">
                <h5>Amazing stories is here. Just try it</h5>
                <p>All of type , All of stories , All of your want </p>
            </div>
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
<br>
<br>
<br>

<div class="row">
    <br>
    <div class="col-8">
        <h1>NEW</h1>
        <br>
        <?php $x = 1 ?>
        <?php foreach ($posts as $post) : ?>
            <div class="row justify-content-center">
                <div class="col-10">

                    <?php if ($auth) : ?>
                        <a href="/stories/post/<?= $post->id ?>">
                        <?php endif; ?>

                        <h4><?= $post->title ?> </h4>

                        <?php if ($auth) : ?>
                        </a>
                    <?php endif; ?>

                    <!-- <p><?= $post->content ?></p> -->
                    <p class="card-subtitle mb-2 text-muted"><?= $post->username ?> --> <?= $post->created_at ?></p>
                </div>
                <!-- <div class="col">
                    <img src="../../img/book-cover-<?= $x++ ?>.jpg" alt="book-cover-1" width="100" height="150">
                </div> -->
            </div>
            <hr class="under-line">
            <br>
            <br>
            <br>

        <?php endforeach; ?>
    </div>

    <!-- </div> -->
    <div class="col">
        <h1>Trend</h1>
        <?php $x = 1; ?>
        <?php foreach ($trends as $trend) : ?>
            <br>
            <div class="card" id="card_trend">
                <div class="card-body">
                    <?php if ($auth) : ?>
                        <a href="/stories/post/<?= $trend->id ?>">
                        <?php endif; ?>
                        <h4 class="card-title"><?= $trend->title ?></h5>
                            <?php if ($auth) : ?>
                        </a>
                    <?php endif; ?>
                    <!-- <img src="../../img/trend-1.jpg" alt="trend-1" width="100" height="100"> -->
                    <hr>
                    <h6 class="card-subtitle mb-2 text-muted"><?= $trend->username ?> --> <?= $trend->published_at ?></h6>
                </div>
            </div>
        <?php endforeach; ?>





    </div>