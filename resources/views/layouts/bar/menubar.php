
<!-- link -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="/">
            <img src="../../img/logo-project.png" width="54.29" height="34.29" class="d-inline-block align-top" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="/">HOME</a>
                </li>
            </ul>
        </div>
        <div id="button-account">
            <button type="button" class="btn btn-outline-secondary" id="log-in-btn" data-toggle="modal"
                data-target="#login-modal">Log in</button>
            <button type="button" class="btn btn-info" id="sign-up-btn" data-toggle="modal"
                data-target="#signup-modal"><strong>Sign up</strong></button>
        </div>
    </nav>

    

    <!-- Modal login-->
    <div class="modal fade" id="login-modal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">

            
            <form action="/users/authen" method="post">

                <div class="container">
                    <div class="modal-header">
                        <div class="container">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <div class="container">
                                <h3 id="header-login" style="text-align:center" class="modal-title">Login</h3>
                            </div>
                        </div>
                    </div>
                    <div class="modal-body">
                    </div>


                    <div class="container">
                        <div>Email</div>
                        <div class="input-group">
                            <span class="input-group-append bg-white border-left-0">
                                <span class="input-group-text bg-transparent">
                                    <i class="fa fa-user"></i>
                                </span>
                            </span>
                            <input required type="email" class="form-control " id="email-login" placeholder="Enter email" name="email">
                        </div>
                        <br>

                        <div>Password</div>
                        <div class="input-group">
                            <span class="input-group-append bg-white border-left-0">
                                <span class="input-group-text bg-transparent">
                                    <i class="fa fa-lock"></i>
                                </span>
                            </span>
                            <input required type="password" class="form-control " id="password-login" placeholder="Enter password"
                                name="password">
                        </div>
                    </div>
                    <br>
                    <div class="modal-footer">
                        <button class="btn btn-outline-info border-left-0 border" type="submit"
                            id="submitBtn">Submit
                            <span class="fa fa-check"></span>
                        </button>
                        <button class="btn btn-outline-danger border-left-0 border"
                            data-dismiss="modal">Cancel
                            <span class="fa fa-times"></span>
                        </button>
                    </div>

                
                </div>

            </form>
            </div>
        </div>
    </div>



    <!-- Modal register-->
    <div class="modal fade" id="signup-modal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="container">
                    <div class="modal-header">
                        <div class="container">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h3 id="header-login" style="text-align: center;" class="modal-title">Sign up</h3>
                        </div>
                    </div>
                    <div class="modal-body">
                    </div>


                    <form action="/users/create" method="post">

                    <div class="container">
                        <div>Email</div>
                        <div class="input-group">
                            <span class="input-group-append bg-white border-left-0">
                                <span class="input-group-text bg-transparent">
                                    <i class="fa fa-envelope"></i>
                                </span>
                            </span>
                            <input required type="email" class="form-control " id="email" placeholder="Enter email" name="email">
                        </div>
                        <br>
                        <div>Username</div>
                        <div class="input-group">
                            <span class="input-group-append bg-white border-left-0">
                                <span class="input-group-text bg-transparent">
                                    <i class="fa fa-user"></i>
                                </span>
                            </span>
                            <input required type="username" class="form-control " id="username" placeholder="Enter username (at least 6 character)"
                                name="username">
                        </div>
                        <br>
                        <div>Password</div>
                        <div class="input-group">
                            <span class="input-group-append bg-white border-left-0">
                                <span class="input-group-text bg-transparent">
                                    <i class="fa fa-unlock"></i>
                                </span>
                            </span>
                            <input required type="password" class="form-control" id="password" placeholder="Enter password (at least 6 character)"
                                name="password">
                        </div>
                        <br>
                        <div>Confirm Password</div>
                        <div class="input-group">
                            <span class="input-group-append bg-white border-left-0">
                                <span class="input-group-text bg-transparent">
                                    <i class="fa fa-lock"></i>
                                </span>
                            </span>
                            <input required type="password" class="form-control " id="c_password"
                                placeholder="Confirm password (at least 6 character)" name="c_password">
                        </div>
                        <br>
                        <div>
                            <span>Birthdate </span>
                            <input required readonly id="datepicker" width="276" placeholder="Please select your birthdate" name="birthdate">
                            <script>
                                $('#datepicker').datepicker({
                                    uiLibrary: 'bootstrap4',
                                    format: 'yyyy-mm-dd'
                                });
                            </script>
                        </div>
                        <br>
                        <div>Gender</div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="inlineRadio1"
                                value=1 checked>
                            <label class="form-check-label" for="inlineRadio1">
                                <i class="fa fa-male" style=" font-size: 20px; color: Dodgerblue"></i>
                                Male</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="inlineRadio2"
                                value=0>
                            <label class="form-check-label" for="inlineRadio2">
                                <i class="fa fa-female" style="font-size: 20px; color: rgb(248, 115, 188)"></i>
                                Female</label>
                        </div>

                    </div>
                    <br>

                    <div class="modal-footer">

                        <button class="btn btn-outline-info border-left-0 border" type="submit"
                            id="submitRegisBtn">Submit
                            <span class="fa fa-check"></span>
                        </button>
                        <button class="btn btn-outline-danger border-left-0 border"
                            data-dismiss="modal">Cancel
                            <span class="fa fa-times"></span>
                        </button>
                    </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
