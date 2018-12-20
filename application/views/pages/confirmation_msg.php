<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Confirmation Messsage</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url(); ?>styles/confirmation_msg.css" />
    <script src="main.js"></script>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
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
    <div class="container-fluid">
        <div class="main-content">
            <div class="row">
                <div class="col-sm-6 col-md-12">
                    <div class="alert-message alert-message-success">
                        <h4>
                            Account Activation Message
                        </h4>
                        <p>
                            The account activation link has been sent to your registered email address.
                            Please activate your account.
                        </p><br />
                        <a href="applicant_registration">
                            <button class="btn-primary">Go Back</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>