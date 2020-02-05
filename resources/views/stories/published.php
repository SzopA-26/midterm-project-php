<?php $this->layout('layouts/app' ,['tab' => 'story']) ?>

<div class="row" id="title-header">
    <div class="col">
        <h1>Your stories</h1>
    </div>
    <div class="col text-right">
        <button type="button" class="btn btn-outline-secondary" id="write-story-btn">Write a story</button>
    </div>
</div>
<ul class="nav nav-tabs" id="link-tab">
    <li class="nav-item">
        <a class="nav-link" href="/stories/draft">Drafts (<?= count($drafts) ?>)</a>
    </li>
    <li class="nav-item">
        <a class="nav-link active" href="/stories/published">Published (<?= count($publisheds) ?>)</a>
    </li>
</ul>

<?php foreach ($publisheds as $published) : ?>

<div class="published-content">

    <h3><?= $published->title ?></h3>
    <figcaption class="figure-caption">
        Published on <?= $published->published_at ?>
        <span class="dropdown">
            <a href="#" class="dropdown-toggle " data-toggle="dropdown" aria-haspopup="true"
                aria-expanded="false"><span class="caret"></span></a>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <li><a class="dropdown-item" href="#">Edit</a></li>
                <li><a class="dropdown-item" href="/stories/delete/<?= $published->id ?>">Delete</a></li>
                <li><a class="dropdown-item" href="/stories/unpublish/<?= $published->id ?>">Unpublish</a></li>
            </ul>
        </span>
    </figcaption>
    <hr>
</div>

<?php endforeach; ?>

