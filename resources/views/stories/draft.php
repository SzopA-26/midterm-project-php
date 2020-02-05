<?php $this->layout('layouts/app' ,['tab' => 'story']) ?>

<div class="row" id="title-header">
    <div class="col">
        <h1>Your stories</h1>
    </div>
    <div class="col text-right">
        <button type="button" class="btn btn-outline-success" id="write-story-btn">Write a story</button>
    </div>
</div>
<ul class="nav nav-tabs" id="link-tab">
    <li class="nav-item">
        <a class="nav-link active" href="/stories/draft">Drafts (<?= count($drafts) ?>)</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/stories/published">Published (<?= count($publisheds) ?>)</a>
    </li>
</ul>

<?php foreach ($drafts as $draft) : ?>

<div class="draft-content">

    <a href="/stories/post">
        <h3><?= $draft->title ?></h3>
    </a>
    <figcaption class="figure-caption">
        Last edited <?= $draft->updated_at ?>
        <span class="dropdown">
            <a href="#" class="dropdown-toggle " data-toggle="dropdown" aria-haspopup="true"
                aria-expanded="false"><span class="caret"></span></a>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <li><a class="dropdown-item" href="/stories/edit/<?= $draft->id ?>">Edit</a></li>
                <li><a class="dropdown-item" href="/stories/delete/<?= $draft->id ?>">Delete</a></li>
                <li><a class="dropdown-item" href="/stories/publish/<?= $draft->id ?>">Publish</a></li>
            </ul>
        </span>
    </figcaption>
    <hr>

</div>
<?php endforeach; ?>
