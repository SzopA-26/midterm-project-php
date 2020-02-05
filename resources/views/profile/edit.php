<?php $this->layout('layouts/app', ['tab' => 'profile']) ?>
<?php

use App\Framework\Utilities\Session;

$auth = Session::read('Auth');
?>


<div class="row">
    <div class="col-4 text-center">
        <div class="card">
            <div class="card-body">
                <figure class="figure">
                    <img src="../../img/icon-profile.png" class="figure-img img-fluid rounded" alt="...">

                </figure>
                <h4>
                    <?= $username ?>
                </h4>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <figcaption class="figure-caption">STORIES</figcaption>
                        <h5><?= $stories ?></h5>
                    </div>
                    <div class="col">
                        <figcaption class="figure-caption">VIEWS</figcaption>
                        <h5><?= $views ?></h5>
                    </div>
                    <div class="col">
                        <figcaption class="figure-caption">FOLLOWERS</figcaption>
                        <h5><?= $followers ?></h5>
                        </h4>
                    </div>
                </div>
            </div>
        </div>
        <a type="button" class="btn btn-outline" id="cancel-btn" href="/profile/user/<?= $auth['username'] ?>"><strong>CANCEL</strong></a>
    </div>
    <div class="col-8">
        <div>
            <div class="card">
                <div class="card-header" style="font-size: 150%;">
                    Edit Profile
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-3">
                                <i class="fa fa-user" style="margin-right: 20px;"></i>
                                <span style="font-size: 110%;"></i>username</span>
                            </div>
                            <div class="col-6">
                                <div style="font-size: 110%;"><?= $username ?></div>
                            </div>
                            <div class="col" style="text-align: right;">
                                <button id="edit-us" type="button" class="btn btn-light" data-toggle="modal" data-target="#edit-us-modal" style="margin-left: auto; margin-right: 0;">
                                    edit
                                </button>
                            </div>
                        </div>

                    <li class="list-group-item">

                        <div class="row">
                            <div class="col-3">
                                <i class="fa fa-key" style="margin-right: 20px;"></i>
                                <span style="font-size: 110%;">password</span>
                            </div>
                            <div class="col-6">
                                <div style="font-size: 110%;" type="password"></div>
                            </div>
                            <div class="col" style="text-align: right;">
                                <button id="edit-pw" type="button" class="btn btn-light" data-toggle="modal" data-target="#edit-pw-modal" style="margin-left: auto; margin-right: 0;">
                                    edit
                                </button>
                            </div>
                        </div>
                </ul>
            </div>
        </div>
    </div>
</div>

<!-- Modal Edit US-->
<div class="modal fade" id="edit-us-modal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <form action="/profile/changeusername" method="post">
            <div class="container">
                <div class="modal-header">
                    <div class="container">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <div class="container">
                            <h3 id="header-login" style="text-align:center" class="modal-title">Change Username</h3>
                        </div>
                    </div>
                </div>
                <div class="modal-body">
                </div>

                <div class="container">

                    <div class="input-group">
                        <span class="input-group-append bg-white border-left-0">
                            <span class="input-group-text bg-transparent">
                                <i class="fa fa-user"></i>
                            </span>
                        </span>
                        <input type="username" class="form-control " id="username" placeholder="Enter new username" name="username">
                    </div>
                    <br>
                    <div class="input-group">
                        <span class="input-group-append bg-white border-left-0">
                            <span class="input-group-text bg-transparent">
                                <i class="fa fa-key"></i>
                            </span>
                        </span>
                        <input type="password" class="form-control " id="password" placeholder="Enter your password" name="c_password">
                    </div>

                </div>
                <br>
                <div class="modal-footer">
                    <button class="btn btn-outline-info border-left-0 border" type="submit">Submit
                        <span class="fa fa-check"></span>
                    </button>
                    <button class="btn btn-outline-danger border-left-0 border" data-dismiss="modal">Cancel
                        <span class="fa fa-times"></span>
                    </button>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Edit PW-->
<div class="modal fade" id="edit-pw-modal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <form action="/profile/changepassword" method="post">
            <div class="container">
                <div class="modal-header">
                    <div class="container">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <div class="container">
                            <h3 id="header-login" style="text-align:center" class="modal-title">Change Password</h3>
                        </div>
                    </div>
                </div>
                <div class="modal-body">
                </div>

                <div class="container">

                    <div class="input-group">
                        <span class="input-group-append bg-white border-left-0">
                            <span class="input-group-text bg-transparent">
                                <i class="fa fa-key"></i>
                            </span>
                        </span>
                        <input type="password" class="form-control " id="password" placeholder="Enter current password" name="old_password">
                    </div>
                    <br>
                    <div class="input-group">
                        <span class="input-group-append bg-white border-left-0">
                            <span class="input-group-text bg-transparent">
                                <i class="fa fa-unlock"></i>
                            </span>
                        </span>
                        <input type="password" class="form-control " id="password" placeholder="Enter new password" name="new_password">
                    </div>
                    <br>
                    <div class="input-group">
                        <span class="input-group-append bg-white border-left-0">
                            <span class="input-group-text bg-transparent">
                                <i class="fa fa-lock"></i>
                            </span>
                        </span>
                        <input type="password" class="form-control " id="password" placeholder="Confirm new password" name="c_password">
                    </div>
                </div>
                <br>
                <div class="modal-footer">
                    <button class="btn btn-outline-info border-left-0 border" type="submit" >Submit
                        <span class="fa fa-check"></span>
                    </button>
                    <button class="btn btn-outline-danger border-left-0 border" data-dismiss="modal">Cancel
                        <span class="fa fa-times"></span>
                    </button>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>