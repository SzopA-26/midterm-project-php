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
                <h5>First slide label</h5>
                <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="../../img/book-try-2.jpg" class="d-block w-100" alt="..." width="500" height="500">
            <div class="carousel-caption d-none d-md-block">
                <h5>Second slide label</h5>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="../../img/book-try-3.jpg" class="d-block w-100" alt="..." width="500" height="500">
            <div class="carousel-caption d-none d-md-block">
                <h5>Third slide label</h5>
                <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
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
        <?php foreach ($posts as $post) : ?>
            <div class="row">
                <div class="col-8">
                    <h5><?= $post->title ?></h5>
                    <p><?= $post->content ?></p>
                    <p><?= $post->created_at ?></p>
                </div>
                <div class="col">
                    <img src="../../img/book-cover-1.jpg" alt="book-cover-1" width="100" height="150">
                </div>
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
        <?php $x=1; ?>
        <?php foreach($trends as $trend) : ?>
        <br>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title"><?= $x++?>. <?= $trend->title ?></h5>
                <h6 class="card-subtitle mb-2 text-muted"><?= $trend->username ?></h6>
                <img src="../../img/trend-1.jpg" alt="trend-1" width="100" height="100">
                <p class="card-text"><?= $trend->content ?></p>
                <!-- <p class="card-text">............................................</p> -->
                <a href="/post/" class="card-link">link</a>
            </div>
        </div>
        <?php endforeach; ?>
        




</div>