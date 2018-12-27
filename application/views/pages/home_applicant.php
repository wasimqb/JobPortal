<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url(); ?>styles/home_applicant.css" />
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
                    <a class="dropdown-item" href="view_profile_jobs">Applied Jobs</a>
                    <a class="dropdown-item" href="view_profile_jobs">Saved for Later</a>
                    <a class="dropdown-item" href="profile_edit">Upload/Change Resume</a>
                    <a class="dropdown-item" href="profile_edit">Edit Profile</a>
                    <a class="dropdown-item" href="sign_out">Sign Out</a>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid main-content">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12">
                    <form class="card card-sm" method="POST" action="search">
                        <div class="card-body row no-gutters align-items-center">
                            <div class="col-md-8">
                                <input class="form-control form-control-lg form-control-borderless" type="search" name="search"
                                    placeholder="Search for Jobs">
                            </div>&nbsp;&nbsp;
                            <div class="col-md-2">
                                <select name="filter" class="form-control-lg">
                                    <option value="" disabled selected>Search criteria</option>
                                    <option value="title">Title</option>
                                    <option value="employer">Employer</option>
                                    <option value="location">Location</option>
                                </select>
                            </div>&nbsp;&nbsp;&nbsp;
                            <div class="col-md-1">
                                <input class="btn btn-lg btn-primary" type="submit" name='submit' value="Search">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            
                <?php echo $error; ?>
                            <?php
                            // print_r($jobs);
                            $j=0;
                            for ($i=0; $i<=count($jobs)/3; $i++)
                            {
                                echo '<div class="row">';
                            
                            while($j<count($jobs))
                            {
                            echo '
                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">'.$jobs[$j]['title'].'</h5>
                                            <p class="card-text">Employer : '.$jobs[$j]['name'].'</p>
                                            <a href="view_job/'.$jobs[$j]['job_id'].'" class="btn btn-primary">View Details</a>
                                        </div>
                                    </div>
                                </div>';
                                $j++;
                                if($j%3==0) {
                                    break;
                                }
                            }
                        echo '</div>'; 
                        }
                            ?>
                            
                            
            
            
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