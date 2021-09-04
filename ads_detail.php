<?php require_once "core/auth.php" ?>
<?php require_once "core/isEditor&Admin.php" ?>
<?php include "template/header.php" ?>


<div class="row">
    <div class="col-12">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-white mb-4">
                <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                <li class="breadcrumb-item"><a href="ads_list.php">Ads</a></li>
                <li class="breadcrumb-item active" aria-current="page">Ads Detail</li>
            </ol>
        </nav>
    </div>
</div>
<?php

$id = $_GET['id'];
$current = ad($id);

?>
<div class="row" >
    <div class="col-12 col-xl-6">
        <div class="card mb-4">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">
                        <i class="feather-git-branch text-primary"></i>  Ads Detail
                    </h4>
                    <a href="ads_list.php" class="btn btn-outline-primary">
                        <i class="feather-database"></i>
                    </a>
                </div>
                <hr>


                <div class="form-inline mb-4">
                    <label for="" class="mr-4">Ads Name :</label>
                   <p class="mb-0"><?php echo $current['owner_name']; ?></p>
                </div>

                <div class="form-inline mb-4">
                    <label for="" class="mr-4">Photo link :</label>
                    <p class="mb-0"><?php echo $current['photo']; ?></p>
                </div>

                <div class="form-inline mb-4">
                    <label for="" class="mr-4">Website link :</label>
                    <p class="mb-0"><?php echo $current['link']; ?></p>
                </div>

              

                    <div class="form-inline mb-4 mr-md-3">
                        <label for="" class="mr-4">Start Date :</label>
                       <p class="mb-0"><?php echo $current['start']; ?></p>
                    </div>

                    <div class="form-inline mb-4">
                        <label for="" class="mr-4">end Date :</label>
                       <p class="mb-0"><?php echo $current['end']; ?></p>
                    </div>
               
                <a href="<?php echo $url ?>ads_list.php" class="btn btn-primary" name=""><i class="feather-arrow-left-circle mr-2"></i>Go Back</a>

            </div>
        </div>
    </div>

</div>



<?php include "template/footer.php" ?>


