<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Applicant Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
        </div>
    </div>
    <div class="container-fluid register main-content">
        <div class="row">
            <div class="col-md-3 register-left">
                <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt="" />
                <h3>Welcome</h3>
                <p></p>
                <a href="applicant_register"><input type="submit" name="applicant_registration" value="Applicant Registration" /></a><br />
            </div>
            <div class="col-md-9 register-right">
                <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="applicant-tab" data-toggle="tab" href="applicant_login"
                            role="tab" aria-controls="applicant" aria-selected="true">Applicant</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="hirer-tab" data-toggle="tab" href="employer_login" role="tab"
                            aria-controls="hirer" aria-selected="false">Employer</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <form method="POST" action="applicant_login">    
                    <h3 class="register-heading">Login as a Employee
                        <small><?php echo @$error; ?></small>
                        </h3>
                        <div class="row register-form">
                            <div class="col-md-8">

                                <div class="form-group">
                                    <input type="email" class="form-control" name="email" placeholder="Your Email *"
                                        value="" />
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" name="password" placeholder="Password *"
                                        value="" />
                                </div>
                                <div class="social-button">
                                    <a href="facebook_login" name="" class="btn btn-md btn-primary">
                                        <i class="fa fa-facebook fa-fw"></i> Sign in with Facebook
                                    </a>
                                    <a href="google_login" class="btn btn-md btn-danger">
                                        <i class="fa fa-google fa-fw"></i> Sign in with Google
                                    </a>
                                </div>
                                <input type="submit" name="login" class="btnRegister" value="Login" />
                            </div>

                        </div>
</form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="page-footer font-small panel-bg pt-4">
        <div class="container-fluid text-center text-md-left">
            <div class="row">
                <div class="col-md-6 mt-md-0 mt-3">
                    <h5 class="text-uppercase">Footer Content</h5>
                    <p>Here you can use rows and columns here to organize your footer content.</p>
                </div>
                <hr class="clearfix w-100 d-md-none pb-3">
                <div class="col-md-3 mb-md-0 mb-3">
                    <h5 class="text-uppercase">Links</h5>
                    <ul class="list-unstyled">
                        <li>
                            <a href="#!">Link 1</a>
                        </li>
                        <li>
                            <a href="#!">Link 2</a>
                        </li>
                        <li>
                            <a href="#!">Link 3</a>
                        </li>
                        <li>
                            <a href="#!">Link 4</a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-3 mb-md-0 mb-3">
                    <h5 class="text-uppercase">Links</h5>
                    <ul class="list-unstyled">
                        <li>
                            <a href="#!">Link 1</a>
                        </li>
                        <li>
                            <a href="#!">Link 2</a>
                        </li>
                        <li>
                            <a href="#!">Link 3</a>
                        </li>
                        <li>
                            <a href="#!">Link 4</a>
                        </li>
                    </ul>

                </div>
            </div>
        </div>
        <div class="footer-copyright text-center py-3">© 2018 Copyright:
            <a href="https://mdbootstrap.com/education/bootstrap/"> MDBootstrap.com</a>
        </div>
    </footer>
</body>

</html>