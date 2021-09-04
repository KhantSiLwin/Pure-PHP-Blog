<?php require_once "core/auth.php" ?>
<?php require_once "core/isEditor&Admin.php" ?>
<?php include "template/header.php" ?>


<div class="row">
    <div class="col-12">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-white mb-4">
                <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                <li class="breadcrumb-item"><a href="ads_list.php">Ads</a></li>
                <li class="breadcrumb-item active" aria-current="page">Add Ads</li>
            </ol>
        </nav>
    </div>
</div>
<?php
if(isset($_POST['addads'])){

    adsadd();
}

?>
<form class="row" method="post" enctype="multipart/form-data">
    <div class="col-12 col-xl-6">
        <div class="card mb-4">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">
                        <i class="feather-git-pull-request text-primary"></i> Add Ads
                    </h4>
                    <a href="ads_list.php" class="btn btn-outline-primary">
                        <i class="feather-database"></i>
                    </a>
                </div>
                <hr>


                <div class="form-group">
                    <label for="">Ads Name</label>
                    <input type="text" name="adsName" class="form-control" id="" required>
                </div>

                <div class="form-group">
                    <label for="">Photo link</label>
                    <div class="d-md-flex align-items-center justify-content-between">
                    <input type="text" name="photolink" class="form-control w-md-50" id="blah" required>
                    <p class="my-2 my-md-0">(OR)</p>
                    <input type="file" name="upload" id="hidden-upload" onchange="document.getElementById('blah').value = window.URL.createObjectURL(this.files[0])" value="" class="" hidden/>
                    <label for="hidden-upload" class="text-nowrap mb-0 btn btn-info rounded">Choose Photo</label>
                    </div>
                </div>

                <div class="form-group">
                    <label for="">Website link</label>
                    <input type="text" name="weblink" class="form-control" id="" required>
                </div>

               <div class=" d-md-flex justify-content-start align-item-center">

                   <div class="form-group mr-md-3">
                       <label for="">Start Date</label>
                       <input type="date" name="startdate" class="form-control" id="" required>
                   </div>

                   <div class="form-group">
                       <label for="">End Date</label>
                       <input type="date" name="enddate" class="form-control" id="" required>
                   </div>
               </div>
                <button class="btn btn-primary" name="addads">Add Ads</button>

            </div>
        </div>
    </div>

</form>



<?php include "template/footer.php" ?>


