<?php $this->layout('layouts/app', ['tab' => 'profile']) ?>
<br>
<div class="row">
    <div class="col-md-2">
        <form action="/search/story" method="post">
            <input type="hidden" value="<?= $search_input ?>" name="search_input">
            <span class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="padding: 10px 16px;">
                    user
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <button class="dropdown-item" id="story-search-btn" type="submit">story</button>
                </div>
            </span>
        </form>
    </div>
    <div class="col-md-10">
        <h2 style="margin-left: -90px">Result(<?= count($users) ?>): " <?= $search_input ?> "</h2>
    </div>
</div>


<?php foreach ($users as $user) : ?>
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card" style="width: 100%">
                <div class="card-body">
                    <a href="/profile/user/<?= $user->username ?>">
                        <?= $user->username ?>
                    </a>
                </div>
            </div>
        </div>
    </div>

<?php endforeach; ?>