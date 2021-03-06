<?php $this->layout('layouts/app', ['tab' => 'dashboard']) ?>

<div class="row">
    <div class="col-6">
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
    <div class="col">
        <div class="card">
            <div class="card-header">
                STORIES PUBLISHING IN A YEAR
            </div>
            <div class="card-body">
                <canvas id="post-chart" style="max-width: 500px; margin:auto;"></canvas>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-6">
        <div class="card ">
            <div class="card-header">
                <div style="font-size:130%; text-align: center; margin-bottom: 10px">TOP POINT USERS</div>

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
                                        <?php $count = 1 ?>
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
                                        <?php $count = 1 ?>
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
                                        <?php $count = 1 ?>
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
    <div class="col">
        <div class="card">
            <div class="card-header">
                GIFT SENDING IN A YEAR
            </div>
            <div class="card-body">
                <canvas id="gift-chart" style="max-width: 500px; margin:auto;"></canvas>
                
            </div>
        </div>
    </div>
</div>




<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"></script>

<?php
$data2script = [];
foreach ($posts_in_year as $post) {
    array_push($data2script, (int) $post->count_published);
}

$data2script = "[" . implode(", ", $data2script) . "]";

?>

<script>
    var ctx = document.getElementById("post-chart").getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
            datasets: [{
                label: 'Story published',

                data: <?= $data2script ?>,
                backgroundColor: [
                    'rgb(255, 124, 248)',
                    'rgb(245, 72, 138)',
                    'rgb(245, 72, 72)',
                    'rgb(255, 131, 131)',
                    'rgb(252, 190, 161)',
                    'rgb(253, 199, 82)',
                    'rgb(61, 221, 226)',
                    'rgb(131, 150, 255)',
                    'rgb(205, 72, 245)',
                    'rgb(130, 34, 194)', 'rgb(81, 93, 255)', 'rgb(2, 0, 92)'
                ],
                borderColor: [
                    'rgb(255, 124, 248)',
                    'rgb(245, 72, 138)',
                    'rgb(245, 72, 72)',
                    'rgb(255, 131, 131)',
                    'rgb(252, 190, 161)',
                    'rgb(253, 199, 82)',
                    'rgb(61, 221, 226)',
                    'rgb(131, 150, 255)',
                    'rgb(205, 72, 245)',
                    'rgb(130, 34, 194)', 'rgb(81, 93, 255)', 'rgb(2, 0, 92)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>

<?php
$data2script = [];
foreach ($gifts_in_year as $gift) {
    array_push($data2script, (int) $gift);
}

$data2script = "[" . implode(", ", $data2script) . "]";

?>


<script>
    var ctx = document.getElementById("gift-chart").getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
            datasets: [{
                label: 'Value of Gifts Sending',

                data: <?= $data2script ?>,
                backgroundColor: [
                    'rgba(255, 124, 248,1)',
                    'rgba(245, 72, 138,1)',
                    'rgba(245, 72, 72,1)',
                    'rgba(255, 131, 131,1)',
                    'rgba(252, 190, 161,1)',
                    'rgba(253, 199, 82,1)',
                    'rgba(61, 221, 226,1)',
                    'rgba(131, 150, 255,1)',
                    'rgba(205, 72, 245,1)',
                    'rgba(130, 34, 194,1)', 'rgba(81, 93, 255,1)', 'rgba(2, 0, 92,1)'
                ],
                borderColor: [
                    'rgb(255, 124, 248)',
                    'rgb(245, 72, 138)',
                    'rgb(245, 72, 72)',
                    'rgb(255, 131, 131)',
                    'rgb(252, 190, 161)',
                    'rgb(253, 199, 82)',
                    'rgb(61, 221, 226)',
                    'rgb(131, 150, 255)',
                    'rgb(205, 72, 245)',
                    'rgb(130, 34, 194)', 'rgb(81, 93, 255)', 'rgb(2, 0, 92)'
                ],
                borderWidth: 5
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>