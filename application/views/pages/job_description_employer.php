<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Job Description</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url(); ?>styles/job_description_employer.css" />
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
                    <div class="card">
                        <div class="card-header text-center">
                            <h5 class="card-title"><strong>Job Description</strong> </h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="title col-md-7">
                                    <strong>Job Title: </strong>
                                    <p><?php echo $job[0]['title'] ?></p>
                                    <strong>Location: </strong>
                                    <p><?php echo $job[0]['location'] ?></p>
                                    <strong>Experience Level: </strong>
                                    <p><?php echo $job[0]['experience'] ?></p>                                </div>
                                <div class="image col-md-5">
                                    <img src="images/google.png" alt="img" height="150px" class="photo pull-right">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <strong>
                                        Roles and responsibilities:
                                    </strong>
                                    <ul style="list-style-type:circle">
                                        <li><?php echo $job[0]['role'] ?></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <strong>
                                        Educational Qualifications:
                                    </strong>
                                    <ol>
                                        <li><?php echo $job[0]['edu_qualification'] ?> from a recognized institution.</li>
                                        <li>Should have minimum of 60% in all the academic years.</li>
                                     </ol>
                                </div>
                            </div>
                            <div class="card-footer">
                                <a href="" class="btn btn-primary pull-right ">Edit</a>
                                <a href="#" class="btn btn-primary">Delete</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header text-center">
                            <h5><strong>Applicants</strong></h5>
                        </div>
                        <?php 
                        foreach($applicants as $applicant){
                            echo '<div class="card-body">
                            <div class="row border-right-0">
                                <div class="col-md-10">
                                    <h4><strong>'.$applicant['firstname'].' '.$applicant['lastname'].'</strong></h4>
                                    Age:'.$applicant['age'].' | Gender: '.$applicant['gender'].'
                                </div>
                                <form method="POST" action="/index.php/employer/view_applicant/'.$applicant['applicant_id'].'">
                                    <input type="submit" name="view_applicant" class="col-md-1.5 btn btn-primary text-center pull-right view"
                                    value = "View Applicant">
                                </form>
                            </div>
                        </div>';
                        }
                        ?>
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