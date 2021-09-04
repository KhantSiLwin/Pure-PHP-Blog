<?php require_once "core/base.php" ?>
<?php require_once "core/function.php" ?>

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
    <link rel="stylesheet" href="<?php echo $url; ?>assets/vendor/data_table/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href=" <?php echo $url ?>assets/vendor/summer_note/summernote-bs4.min.css">
    <link rel="stylesheet" href=" <?php echo $url ?>assets/css/style.css">
    <link rel="stylesheet" href=" <?php echo $url ?>assets/css/night-mode.css">
</head>
<body>
    

    <section class="main container-fluid">

       <div class="row">

       <?php include "sidebar.php" ?>

       <div class="col-12 col-lg-9 col-xl-10 vh-100 parent py-3 content">
            <div class="row header mb-4">
                <div class="col-12">
                    <div class="p-2 bg-primary rounded d-flex justify-content-between align-items-center">
                        <button class="show-sidebar-btn btn d-block d-lg-none btn-primary">
                            <i class="feather-menu text-light"  style="font-size: 2em;"></i>
                        </button>
                        <form action="" method="post" class="d-none d-md-block">
                            <div class="form-inline">
                                <input type="text" placeholder="Search Names" class="form-control mr-2">
                                <button class="btn btn-light">
                                    <i class="feather-search text-primary"></i>
                                </button>
                            </div>
                        </form>
                        <div class="dropdown">
                            <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="<?php echo $url ?><?php echo $_SESSION['user']['photo'] ?>" class="user-img shadow-sm" alt=""> <?php echo $_SESSION['user']['name'] ?>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="profile_detail.php">View Profile</a>
                                <a class="dropdown-item" href="profile_update.php">Edit Profile</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="<?php echo $url; ?>logout.php">Logout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>