<?php $this->layout('layouts/app' ,['tab' => 'profile']) ?>

<div class="row">
    <div class="col-4 text-center">
        <div class="card">
            <div class="card-body">
                <figure class="figure">
                    <img src="../../img/icon-profile.png" class="figure-img img-fluid rounded" alt="...">
                    <!-- <figcaption class="figure-caption">A caption for the above image.</figcaption> -->
                </figure>
                <h4>
                    <?= $auth['username'] ?>
                </h4>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <figcaption class="figure-caption">STORIES</figcaption>
                        <h5>23</h5>
                    </div>
                    <div class="col">
                        <figcaption class="figure-caption">VIEWS</figcaption>
                        <h5>138K</h5>
                    </div>
                    <div class="col">
                        <figcaption class="figure-caption">FOLLOWERS</figcaption>
                        <h5>46K</h5>
                        </h4>
                    </div>
                </div>
            </div>
        </div>
        <button type="button" class="btn btn-primary" id="follow-btn"><strong>FOLLOW</strong></button>
    </div>
    <div class="col-8">
        <div class="card">
            <div class="card-body">
                This is some text within a card body.
            </div>
        </div>
    </div>
</div>