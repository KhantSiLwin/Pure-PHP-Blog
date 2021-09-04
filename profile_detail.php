<?php require_once "core/auth.php" ?>
<?php include "template/header.php" ?>


            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb bg-white mb-4">
                            <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                            <li class="breadcrumb-item"><a href="profile.php">Profile</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Profile Detail</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-xl-8">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <h4 class="mb-0">
                                    <i class="feather-hash text-primary"></i> View Profile
                                </h4>
                                <a href="profile_update.php" class="btn btn-outline-primary">
                                    <i class="feather-edit"></i>
                                </a>
                            </div>
                            <hr>

                         <div class="d-flex justify-content-center">
                       <div>
                                <div class="form-group d-flex justify-content-center">
                                    <img src="<?php echo $url.$_SESSION['user']['photo'] ?>"  class="user-edit-img shadow-sm" alt="">
                                </div>

                                <div class="form-inline mb-4">
                                <label for="">Your Name : </label>
                                  <p class="mb-0 ml-2"><?php echo $_SESSION['user']['name'] ?></p>
                                </div>

                                <div class="form-inline">
                                <label for="">Your Email : </label>
                                  <p class="mb-0 ml-2"><?php echo $_SESSION['user']['email'] ?></p>
                                </div>

                                <hr>
                            </div>
                         </div>

                        </div>
                    </div>
                </div>
            </div>
           


<?php include "template/footer.php" ?>


