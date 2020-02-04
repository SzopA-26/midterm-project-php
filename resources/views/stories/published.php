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
        <a class="nav-link" href="/stories/draft">Drafts (1)</a>
    </li>
    <li class="nav-item">
        <a class="nav-link active" href="/stories/published">Published (2)</a>
    </li>
</ul>

<div class="published-content">
    <h3>Star Galactic(1)</h3>
    <p>in garaxy far far away...</p>
    <figcaption class="figure-caption">
        Published on Jan 19, 2019
        <span class="dropdown">
            <a href="#" class="dropdown-toggle " data-toggle="dropdown" aria-haspopup="true"
                aria-expanded="false"><span class="caret"></span></a>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <li><a class="dropdown-item" href="#">Edit</a></li>
                <li><a class="dropdown-item" href="#">Delete</a></li>
                <li><a class="dropdown-item" href="#">Unpublish</a></li>
            </ul>
        </span>
    </figcaption>
    <hr>
</div>

<div class="published-content">
    <h3>Star Galactic(2)</h3>
    <p>in garaxy far far away...</p>
    <figcaption class="figure-caption">
        Published on June 4, 2019
        <span class="dropdown">
            <a href="#" class="dropdown-toggle " data-toggle="dropdown" aria-haspopup="true"
                aria-expanded="false"><span class="caret"></span></a>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <li><a class="dropdown-item" href="#">Edit</a></li>
                <li><a class="dropdown-item" href="#">Delete</a></li>
                <li><a class="dropdown-item" href="#">Unpublish</a></li>
            </ul>
        </span>
    </figcaption>
    <hr>
</div>