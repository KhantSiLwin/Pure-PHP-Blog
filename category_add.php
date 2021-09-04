<?php require_once "core/auth.php" ?>
<?php require_once "core/isEditor&Admin.php" ?>
<?php include "template/header.php" ?>


            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb bg-white mb-4">
                            <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Categories</li>
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
                                    <i class="feather-layers text-primary"></i> Category Manager
                                </h4>
                                
                            </div>
                            <hr>
                            <?php
                            if(isset($_POST['addcat-btn'])){
                            
                             categoryadd();
                             }

                             ?>

                            <form method="post">
                                
                                <div class="form-inline">
                                    <input type="text" name="title" class="form-control" id="" required>
                                    <button class="btn btn-primary ml-md-2 form-control mt-2 mt-md-0" name="addcat-btn">Add Category</button>
                                </div>
                               
                            </form>

                          <?php   include_once 'category_list.php'   ?>

                        </div>
                    </div>
                </div>
            </div>
           


<?php include "template/footer.php" ?>

<!-- <script>
    $(".table").dataTable({
        "order":[[0,"desc"]]
    });
</script> -->
