<?php require_once "core/auth.php" ?>
<?php require_once "core/isEditor&Admin.php" ?>
<?php include "template/header.php" ?>


<div class="row">
    <div class="col-12">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-white mb-4">
                <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                <li class="breadcrumb-item"><a href="ads_list.php">Ads</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Ads</li>
            </ol>
        </nav>
    </div>
</div>
<?php

$id = $_GET['id'];
$current = ad($id);

if(isset($_POST['updateadsBtn'])){

    if (adsUpdate()) {
        linkTo('ads_list.php');
    }
}

?>
<form class="row" method="post" enctype="multipart/form-data">
    <div class="col-12 col-xl-6">
        <div class="card mb-4">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">
                        <i class="feather-git-branch text-primary"></i> Edit Ads
                    </h4>
                    <a href="ads_list.php" class="btn btn-outline-primary">
                        <i class="feather-database"></i>
                    </a>
                </div>
                <hr>


                <div class="form-group">
                    <input type="hidden" value="<?php echo $id; ?>" name="id" >
                    <label for="">Ads Name</label>
                    <input type="text" value="<?php echo $current['owner_name']; ?>" name="adsName" class="form-control" id="" required>
                </div>

                <div class="form-group">
                    <label for="">Photo link</label>
                    <div class="d-md-flex justify-content-between">
                    <input type="text" id="blah" value="<?php echo $current['photo']; ?>"  name="photolink" class="w-md-50 form-control" required>
                    <p class="pt-3 pt-md-0">(OR)</p>
                    <input type="file" name="upload" id="hidden-upload" onchange="document.getElementById('blah').value = window.URL.createObjectURL(this.files[0])" value="" class="" hidden/>
                    <label for="hidden-upload" class="text-nowrap mb-0 btn btn-info rounded">Choose Photo</label>
                    </div>
                </div>

                <div class="form-group">
                    <label for="">Website link</label>
                    <input type="text" value="<?php echo $current['link']; ?>" name="weblink" class="form-control" id="" required>
                </div>

                <div class=" d-md-flex justify-content-start align-item-center">

                    <div class="form-group mr-md-3">
                        <label for="">Start Date</label>
                        <input type="date" value="<?php echo $current['start']; ?>" name="startdate" class="form-control" id="" required>
                    </div>

                    <div class="form-group">
                        <label for="">end Date</label>
                        <input type="date" value="<?php echo $current['end']; ?>" name="enddate" class="form-control" id="" required>
                    </div>
                </div>
                <button class="btn btn-primary" name="updateadsBtn">Update Ads</button>

            </div>
        </div>
    </div>

</form>



<?php include "template/footer.php" ?>


