<?php 

require_once "core/base.php";
require_once "core/function.php"

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" id="theme" content="#2d6498">
    <meta name="msapplication-navbutton-color" content="#2d6498">
    <title>Admin dashboard</title>
    <link rel="stylesheet" href=" <?php echo $url ?>assets/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href=" <?php echo $url ?>assets/vendor/feather-icons-web/feather.css">
    <link rel="stylesheet" href=" <?php echo $url ?>assets/css/style.css">
</head>
<body style="background-color: var(--primary-soft);">


    <div class="container">
        <div class="row justify-content-center align-items-center min-vh-100">
            <div class="col-12 col-md-6">
                <div class="card">
                    <div class="card-body">
                    <h4 class="text-center text-primary">
                    <i class="feather-users"></i>
                    User Register</h4>
                    <hr>

                    <?php 
                        
                        if(isset($_POST['reg-btn'])){
                            
                            echo register();
                        }

                    ?>

                      <form method="POST">
                        <div class="form-group">
                            <label for="username">
                                <i class="feather-user text-primary"></i>
                                User Name
                            </label>
                            <input type="text" name="name"  class="form-control" id="" required>
                        </div>

                        <div class="form-group">
                            <label for="email">
                                <i class="feather-mail text-primary"></i>
                                Your Email
                            </label>
                            <input type="text" name="email"  class="form-control" id="" required>
                        </div>

                        <div class="form-group">
                            <label for="password">
                                <i class="feather-lock text-primary"></i>
                                Password
                            </label>
                            <input type="password" name="password" min="8" class="form-control" id="" required>
                        </div>

                        <div class="form-group">
                            <label for="cpassword">
                                <i class="feather-lock text-primary"></i>
                                Comfirm Your Password
                            </label>
                            <input type="password" name="cpassword" min="8" class="form-control" id="" required>
                        </div>

                        <div class="form-group mb-0">
                            <button class="btn btn-primary" name="reg-btn"><i class="feather-log-in p-1"></i>Register</button>
                            <a href="login.php" class="btn btn-outline-primary">Log in</a>
                        </div>
                      </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
    <script src=" <?php echo $url ?>assets/vendor/jquery.min.js"></script>
    <script src="<?php echo $url ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo $url ?>assets/vendor/counter_up/counter_up.js"></script>
    <script src="<?php echo $url ?>assets/vendor/way_point/jquery.waypoints.min.js"></script>
    <script src="<?php echo $url ?>assets/vendor/chart_js/chart.min.js"></script>
    <script src="<?php echo $url ?>assets/js/dashboard.js"></script>
    <script src="<?php echo $url ?>assets/js/app.js"></script>

</body>
</html>