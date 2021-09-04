<?php require_once "core/auth.php" ?>
<?php include "template/header.php" ?>


            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb bg-white mb-4">
                            <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                            <li class="breadcrumb-item"><a href="profile.php">Profile</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Profile Edit</li>
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
                                    <i class="feather-edit text-primary"></i> Update Profile
                                </h4>
                                <a href="profile_detail.php" class="btn btn-outline-primary">
                                    <i class="feather-hash"></i>
                                </a>
                            </div>
                            <hr>

                         <div class="d-flex justify-content-center">
                            <?php

                            $id=$_SESSION['user']['id'];
                            if(isset($_POST['updateProfile'])){

                                if (updateProfile($id)) {
                                    linkTo('dashboard.php');
                                }
                            }

                            ?>
                         <form method="post" enctype="multipart/form-data">
                                <div class="form-group d-flex justify-content-center position-relative">
                                    <input type="hidden" value="<?php echo $id; ?>" name="id" >
                                    <img src="<?php echo $url.$_SESSION['user']['photo'] ?>" id="blah" class="user-edit-img shadow-sm" alt="">
                                    <input type="file" name="upload" id="hidden-upload" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])" value="" class="" hidden/>
                                    <label for="hidden-upload" class="hidden-upload shadow-lg"><i class="feather-edit-2 text-primary p-2 hidden-upload-i shadow-lg"></i></label>
                                </div>

                                <div class="form-inline mb-4">
                                    <label for="">Your Name : </label>
                                    <input type="text" name="name" class="form-control ml-2" value="<?php echo $_SESSION['user']['name'] ?>">
                                </div>

                                <div class="form-inline">                                   
                                    <label for="">Your Email : </label>
                                    <input type="text" class="form-control ml-2" name="email" value="<?php echo $_SESSION['user']['email'] ?>">
                                </div>

                                <hr>
                                <button class="btn btn-primary d-flex align-items-end" name="updateProfile">Save</button>
                            </form>
                         </div>

                        </div>
                    </div>
                </div>
            </div>
           


<?php include "template/footer.php" ?>
