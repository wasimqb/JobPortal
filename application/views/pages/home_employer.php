<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url(); ?>styles/home_employer.css" />
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
        </div>
    </div>
    <div class="container-fluid main-content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <a href="add_job" class="btn btn-info btn-lg pull-right">
                        <i class="fa fa-plus-circle"></i> Add Job
                    </a>
                </div>
            </div>
            <?php
                            //  print_r($jobs);
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
                                            <p class="card-text">Experience : '.$jobs[$j]['experience'].'</p>
                                            <a href="job_description_employer/'.$jobs[$j]['job_id'].'" class="btn btn-primary">View Details</a>
                                        </div>
                                    </div>
                                </div>';
                                $j++;
                                if($j%3==0) {
                                    break;
                                }
                            }
                        echo '</div>'; 
                        } // 
                                // echo $jobs[0]['title'];
                                // echo "<br>".$userData->name;
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