<?php $this->layout('layouts/app', ['tab' => 'dashboard']) ?>



<div class="row">
    <div class="col-8">
        <div class="card ">
            <div class="card-header">
                <div style="font-size:130%; text-align: center; margin-bottom: 10px">TOP POST VIEWS</div>

                <ul class="nav nav-tabs card-header-tabs pull-left" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="daily-tab" data-toggle="tab" href="#week-views" role="tab" aria-controls="week-views" aria-selected="true">Weekly</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="weekly-tab" data-toggle="tab" href="#month-views" role="tab" aria-controls="month-views" aria-selected="false">Monthly</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="monthly-tab" data-toggle="tab" href="#year-views" role="tab" aria-controls="year-views" aria-selected="false">Yearly</a>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="week-views" role="tabpanel" aria-labelledby="week-views-tab">
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <table style="width:100%; margin:auto;">
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Story</th>
                                            <th scope="col">Username</th>
                                            <th scope="col">Views</th>

                                        </tr>
                                        <?php $count = 1 ?>
                                        <?php foreach ($weekly_posts as $post) : ?>
                                            <tr>
                                                <th scope="row"><?= $count++ ?></th>
                                                <td><?= $post->title ?></td>
                                                <td><?= $post->username ?></td>
                                                <td><?= $views[$post->id] ?></td>
                                            </tr>
                                        <?php endforeach; ?>

                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="month-views" role="tabpanel" aria-labelledby="month-views-tab">
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <table style="width:100%; margin:auto;">
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Story</th>
                                            <th scope="col">Username</th>
                                            <th scope="col">Views</th>
                                        </tr>
                                        <?php $count = 1 ?>
                                        <?php foreach ($monthly_posts as $post) : ?>
                                            <tr>
                                                <th scope="row"><?= $count++ ?></th>
                                                <td><?= $post->title ?></td>
                                                <td><?= $post->username ?></td>
                                                <td><?= $views[$post->id] ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="year-views" role="tabpanel" aria-labelledby="year-views-tab">
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <table style="width:100%; margin:auto;">
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Story</th>
                                            <th scope="col">Username</th>
                                            <th scope="col">Views</th>
                                        </tr>
                                        <?php $count = 1 ?>
                                        <?php foreach ($yearly_posts as $post) : ?>
                                            <tr>
                                                <th scope="row"><?= $count++ ?></th>
                                                <td><?= $post->title ?></td>
                                                <td><?= $post->username ?></td>
                                                <td><?= $views[$post->id] ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-6">
        <div class="card ">
            <div class="card-header">
                <div style="font-size:130%; text-align: center; margin-bottom: 10px">TOP GIFT USERS</div>

                <ul class="nav nav-tabs card-header-tabs pull-left" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="daily-tab" data-toggle="tab" href="#week-point" role="tab" aria-controls="week-point" aria-selected="true">Weekly</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="weekly-tab" data-toggle="tab" href="#month-point" role="tab" aria-controls="month-point" aria-selected="false">Monthly</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="monthly-tab" data-toggle="tab" href="#year-point" role="tab" aria-controls="year-point" aria-selected="false">Yearly</a>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="week-point" role="tabpanel" aria-labelledby="week-point-tab">
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <table style="width:100%; margin:auto;">
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Username</th>
                                            <th scope="col">points</th>

                                        </tr>
                                        <?php $count =0 ?>
                                        <?php foreach ($weekly_gifts as $username => $value) : ?>
                                            <tr>
                                                <th scope="row"><?= $count++ ?></th>
                                                <td><?= $username ?></td>
                                                <td><?= $value ?></td>
                                            </tr>
                                        <?php endforeach; ?>

                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="month-point" role="tabpanel" aria-labelledby="month-point-tab">
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <table style="width:100%; margin:auto;">
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Username</th>
                                            <th scope="col">points</th>
                                        </tr>
                                        <?php $count =0 ?>
                                        <?php foreach ($monthly_gifts as $username => $value) : ?>
                                            <tr>
                                                <th scope="row"><?= $count++ ?></th>
                                                <td><?= $username ?></td>
                                                <td><?= $value ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="year-point" role="tabpanel" aria-labelledby="year-point-tab">
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <table style="width:100%; margin:auto;">
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Username</th>
                                            <th scope="col">points</th>

                                        </tr>
                                        <?php $count =0 ?>
                                        <?php foreach ($yearly_gifts as $username => $value) : ?>
                                            <tr>
                                                <th scope="row"><?= $count++ ?></th>
                                                <td><?= $username ?></td>
                                                <td><?= $value ?></td>
                                            </tr>
                                        <?php endforeach; ?>

                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- </div>
<div class="card ">
    <div class="card-header">
        <ul class="nav nav-tabs card-header-tabs pull-left" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="daily-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Daily</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="weekly-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Weekly</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="monthly-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Monthly</a>
            </li>
        </ul>
    </div>
    <div class="card-body">
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">...</div>
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <div class="row">
                    <div class="col-4">
                        <h3>Most View</h3>
                        <br>
                        <table style="width:100%">
                            <tr>
                                <th>Name</th>
                                <th>View</th>
                            </tr>
                            <tr>
                                <td>Zee</td>
                                <td>10000</td>
                            </tr>
                            <tr>
                                <td>Bob</td>
                                <td>9995</td>
                            </tr>
                            <tr>
                                <td>Viva</td>
                                <td>8957</td>
                            </tr>
                            <tr>
                                <td>Fit</td>
                                <td>5221</td>
                            </tr>
                            <tr>
                                <td>Tee</td>
                                <td>4532</td>
                            </tr>
                        </table>
                    </div>

                  
                </div>
            </div>
            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">...</div>
        </div>
    </div>
</div> -->