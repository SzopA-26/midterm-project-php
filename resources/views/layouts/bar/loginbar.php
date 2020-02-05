<?php
$class1 = 'nav-link';
$class2 = 'nav-link';
$class3 = 'nav-link';
$class4 = 'nav-link';
if ($tab === 'home') {
    $class1 = $class1 . ' active';
} else if ($tab === 'profile') {
    $class2 = $class2 . ' active';
} else if ($tab === 'stories') {
    $class3 = $class3 . ' active';
}

use App\Framework\Utilities\Session;

$auth = Session::read('Auth');
?>

<!-- link -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="/">
        <img src="../../img/logo-project.png" width="54.29" height="34.29" class="d-inline-block align-top" alt="">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="<?= $class1 ?>" href="/">HOME</a>
            </li>
            <li class="nav-item">
                <a class="<?= $class2 ?>" href="/profile/user/<?= $auth['username'] ?>">PROFILE</a>
            </li>
            <li class="nav-item">
                <a class="<?= $class3 ?>" href="/stories/draft">STORIES</a>
            </li>
        </ul>
        <div class="dropdown">
            <button class="btn btn-outline-secondary " type="button" id="dropdown-update" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-bell"></i>
                <!-- UPDATE -->
            </button>
            <div class="dropdown-menu" id="update-menu" aria-labelledby="dropdownMenu2">
                <button class="dropdown-item" type="button">
                    <div class="row">
                        <div class="col-4">
                            <img src="../../img/trend-1.jpg" width="80" height="80" style="margin-right: 0; margin-left: auto;">
                        </div>
                        <div class="col">
                            <div>user1 like your post</div>
                            <div>12/01/2020 21:00</div>
                        </div>
                    </div>
                </button>
            </div>
        </div>

        <form class="form-inline" id="search-form" action="/search/user" method="post">
            <input required class="form-control mr-sm-2" type="search" placeholder="Search..." aria-label="Search" id="search-input" name="search_input">
            <button class="btn btn-outline-secondary my-2 my-sm-0" type="submit" id="search-btn">
                <i class="fa fa-search"></i>
            </button>
        </form>
    </div>
    <div id="button-account">
        <a type="button" class="btn btn-outline-secondary" id="log-out-btn" href="/users/logout">Log out</a>
    </div>
</nav>