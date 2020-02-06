<?php $this->layout('layouts/app', ['tab' => 'dashboard']) ?>



<div class="container">
    <div class="row">
        <div class="col-4">
            <div class="card ">
                <div class="card-header">
                    <div style="font-size:130%; text-align: center; margin-bottom: 10px">Most view</div>

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
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="container">
                                <div class="row">
                                    <div class="col">
                                        <table style="width:100%; margin:auto;">
                                            <tr>
                                                <th>Name</th>
                                                <th>View</th>
                                                
                                            </tr>
                                            <?php foreach($posts as $post) : ?>
                                            <tr>
                                                <td><?= $post->username ?></td>
                                                <td><?= $views[$post->id] ?></td>
                                            </tr>
                                            <?php endforeach; ?>
                                            
                                        </table>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="container">
                                <div class="row">
                                    <div class="col">
                                        <table style="width:100%; margin:auto;">
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
                        </div>
                        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                            <div class="container">
                                <div class="row">
                                    <div class="col">
                                        <table style="width:100%; margin:auto;">
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