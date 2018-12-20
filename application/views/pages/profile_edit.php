<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Edit Profile</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url(); ?>styles/edit_profile.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>

<body>
    <div class="navbar navbar-dark header box-shadow">
        <div class="container d-flex justify-content-between">
            <a href="#" class="navbar-brand d-flex align-items-center">
                <strong>Jobber</strong>
            </a>
            <div class="dropdown">
                <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    Profile
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="profile_edit.html">Upload/Change Resume</a>
                    <a class="dropdown-item" href="#">Applied Jobs</a>
                    <a class="dropdown-item" href="#">Saved for Later</a>
                    <a class="dropdown-item" href="#">Edit Profile</a>
                    <a class="dropdown-item" href="#">Sign Out</a>
                </div>
            </div>

            <!-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader"
                                        aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
                                        <span class="navbar-toggler-icon"></span>
                                    </button> -->
        </div>
    </div>
    <div class="container-fluid main-content">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-center">
                        <h5 class="card-title">Resume Preview</h5>
                    </div>
                    <embed src="files/resume.pdf" class="col-md-12" height="622px" type='application/pdf' />
                    <div class="card-body">
                    <form method="POST" action="upload_resume">
                        <h5 class="card-title">Upload/Change Resume</h5>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                            </div>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                            </div>&nbsp;
                            <a href="#" class="btn btn-primary">Submit</a>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-center">
                        <h5 class="card-title">Edit Profile</h5>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="update_profile">
                            <div class="form-group">
                                <input type="text" class="form-control" name="first_name" placeholder="<?php echo $applicant[0]['firstname'];?>"
                                    value="<?php echo $applicant[0]['firstname'];?>" />
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="last_name" placeholder="<?php echo $applicant[0]['lastname'];?>"
                                    value="<?php echo $applicant[0]['lastname'];?>" />
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name="password" placeholder="Password *"
                                    value="" />
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name="confirm_password" placeholder="Confirm Password *"
                                    value="" />
                            </div>
                            <div class="form-group">
                                <input type="text" minlength="10" maxlength="10" name="phone" class="form-control"
                                    placeholder="<?php echo $applicant[0]['phone'];?>" value="<?php echo $applicant[0]['phone'];?>" />
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="address1" placeholder="<?php echo $applicant[0]['addressLine1'];?>"
                                    value="<?php echo $applicant[0]['addressLine1'];?>" />
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="address2" placeholder="<?php echo $applicant[0]['addressLine2'];?>"
                                    value="<?php echo $applicant[0]['addressLine2'];?>" />
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="city" placeholder="<?php echo $applicant[0]['city'];?>"
                                    value="<?php echo $applicant[0]['city'];?>" />
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="state" placeholder="<?php echo $applicant[0]['state'];?>"
                                    value="<?php echo $applicant[0]['state'];?>" />
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="country" placeholder="<?php echo $applicant[0]['country'];?>"
                                    value="<?php echo $applicant[0]['country'];?>" />
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="pincode" placeholder="<?php echo $applicant[0]['pincode'];?>"
                                    value="<?php echo $applicant[0]['pincode'];?>" />
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="edu_qualification" placeholder="<?php echo $applicant[0]['edu_qualification'];?>"
                                    value="<?php echo $applicant[0]['edu_qualification'];?>" />
                            </div>
                            <input type="submit" name="update" class="btnRegister" value="Update" />
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