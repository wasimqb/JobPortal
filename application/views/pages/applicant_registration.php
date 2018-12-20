<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Applicant Registration</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="<?php echo base_url(); ?>styles/home_style.css" rel="stylesheet">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>

<body>
    <div class="navbar navbar-dark header box-shadow">
        <div class="container d-flex justify-content-between">
            <a href="#" class="navbar-brand d-flex align-items-center">
                <strong>Jobber</strong>
            </a>
            <!-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader"
                aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button> -->
        </div>
    </div>
    <div class="container-fluid register main-content">
        <div class="row">
            <div class="col-md-3 register-left">
                <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt="" />
                <h3>Welcome</h3>
                <p>You are just few steps away from being part of our team</p>
                <a href="applicant_login"><input type="submit" name="applicant_login" value="Applicant Login" /></a><br />
            </div>
            <div class="col-md-9 register-right">
                <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="applicant-tab" data-toggle="tab" href="applicant_registration"
                            role="tab" aria-controls="applicant" aria-selected="true">Applicant</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="hirer-tab" data-toggle="tab" href="employer_registration" role="tab"
                            aria-controls="hirer" aria-selected="false">Employer</a>
                    </li>
                </ul>
                <form action="applicant_registration" method="POST">
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                
                            <h3 class="register-heading">Apply as an Employee
                                <small><?php echo @$error; ?></small>
                            </h3>
                            <div class="row register-form">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="first_name" placeholder="First Name *"
                                            value="" />
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="last_name" placeholder="Last Name *"
                                            value="" />
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="age" placeholder="Age *"
                                            value="" />
                                    </div>
                                    <div class="form-group">
                                        <input type="email" class="form-control" name="email" placeholder="Your Email *"
                                            value="" />
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" name="password" placeholder="Password *"
                                            value="" />
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" name="confirm_password" placeholder="Confirm Password *"
                                            value="" />
                                            <?php echo @$password_error; ?>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" minlength="10" maxlength="10" name="phone" class="form-control"
                                            placeholder="Your Phone *" value="" />
                                    </div>
                                    <div class="form-group">
                                        <div class="maxl">
                                            <label class="radio inline">
                                                <input type="radio" name="gender" value="m" checked>
                                                <span> Male </span>
                                            </label>
                                            <label class="radio inline">
                                                <input type="radio" name="gender" value="f">
                                                <span>Female </span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                <div class="form-group">
                                        <input type="text" class="form-control" name="address1" placeholder="Address Line 1 *"
                                            value="" />
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="address2" placeholder="Address Line 2 *"
                                            value="" />
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="city" placeholder="City *"
                                            value="" />
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="state" placeholder="State *"
                                            value="" />
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="country" placeholder="Country *"
                                            value="" />
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="pincode" placeholder="Pincode *"
                                            value="" />
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="edu_qualification" placeholder="Educational Qualification *"
                                            value="" />
                                    </div>
                                    <input type="submit" class="btnRegister" value="Register" name="register"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <footer class="page-footer font-small panel-bg pt-4">
        <div class="container-fluid text-center text-md-left">
            <div class="row">
                <div class="col-md-6 mt-md-0 mt-3">
                    <h5 class="text-uppercase">Jobber Solutions Inc.</h5>
                    <p>The best platform to find your career.</p>
                </div>
                <hr class="clearfix w-100 d-md-none pb-3">
                <div class="col-md-3 mb-md-0 mb-3">
                    <h5 class="text-uppercase">Useful Links</h5>
                    <ul class="list-unstyled">
                        <li>
                            <a href="#!">Find a Job</a>
                        </li>
                        <li>
                            <a href="#!">Apply for Job</a>
                        </li>
                        <li>
                            <a href="#!">Post a Job</a>
                        </li>
                        <li>
                            <a href="#!">Find employees</a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-3 mb-md-0 mb-3">

                    <h5 class="text-uppercase">More</h5>
                    <ul class="list-unstyled">
                        <li>
                            <a href="#!">About Us</a>
                        </li>
                        <li>
                            <a href="#!">Contact Us</a>
                        </li>
                        <li>
                            <a href="#!">FAQ</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="footer-copyright text-center py-3">© 2018 Copyright:
            <a href="https://mdbootstrap.com/education/bootstrap/"> Jobber.com</a>
        </div>
    </footer>
</body>

</html>