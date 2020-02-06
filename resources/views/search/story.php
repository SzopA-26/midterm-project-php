<?php $this->layout('layouts/app', ['tab' => 'profile']) ?>
<br>
<div class="row">
    <div class="col-md-2">
        <form action="/search/user" method="post">
            <input type="hidden" value="<?= $search_input ?>" name="search_input">
            <span class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="padding: 10px 16px;">
                    story
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <button class="dropdown-item" id="user-search-btn" type="submit">user</button>
                </div>
            </span>
        </form>
    </div>
    <div class="col-md-10">
        <h2 style="margin-left: -90px">Result(<?= count($posts) ?>): " <?= $search_input ?> "</h2>
    </div>
</div>


<?php foreach ($posts as $post) : ?>
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card" style="width: 100%">
                <div class="card-body">
                    <a href="/stories/post/<?= $post->id ?>">
                        <?= $post->title ?>
                    </a>
                </div>
            </div>
        </div>
    </div>

<?php endforeach; ?>