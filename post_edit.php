<?php require_once "core/auth.php" ?>
<?php include "template/header.php" ?>


            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb bg-white mb-4">
                            <li class="breadcrumb-item"><a href="dashboard.html">Home</a></li>
                            <li class="breadcrumb-item"><a href="post_list.html">Post</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Add Post</li>
                        </ol>
                    </nav>
                </div>
            </div>

                             <?php
                              $id = $_GET['id'];
                              $current = post($id);
  
                              if(isset($_POST['updatePost'])){
                              
                                  if (postUpdate()) {
                                     linkTo('post_list.php');
                                  }
                               }


                             ?>

            <form class="row" method="post">
                <div class="col-12 col-xl-8">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <h4 class="mb-0">
                                    <i class="feather-plus-circle text-primary"></i> Update Post
                                </h4>
                                <a href="post_list.php" class="btn btn-outline-primary">
                                    <i class="feather-list"></i>
                                </a>
                            </div>
                            <hr>
                           
                            
                                <div class="form-group">
                                  <input type="hidden" value="<?php echo $id; ?>" name="id" >
                                    <label for="">Post Title</label>
                                    <input type="text" name="title" class="form-control" id="" value="<?php echo $current['title'] ?>" required>
                                </div>

                                <!-- <div class="form-group">
                                    <label for="">Category ID</label>
                                    <select name="category_id" id="" class="form-control custom-select">
                                      <?php foreach(categories() as $c) { ?> 
                                        <option value="<?php echo $c['id']; ?>" <?php echo $c['id']== $current['category_id'] ?"selected":"" ; ?>><?php echo $c['title'] ?></option> 
                                      <?php } ?> 
                                    </select>
                                </div> -->

                                

                                <div class="form-group">
                                    <label for="">Post description</label>
                                    <textarea type="text" name="description" id="description" rows="10" class="form-control" required><?php echo $current['description'] ?></textarea>
                                </div>

                                <hr>
                                

                        </div>
                    </div> </div>
                    <div class="col-12 col-xl-4">
                    <div class="card">
                        <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                                <h4 class="mb-0">
                                    <i class="feather-layers text-primary"></i> Select Category
                                </h4>
                                <a href="post_list.php" class="btn btn-outline-primary">
                                    <i class="feather-list"></i>
                                </a>
                        </div>
                             <hr>
                        <div class="form-group">
                                     <?php foreach(categories() as $c) { ?>
                                        <div class="custom-control custom-radio">
                                        <input type="radio" name="category_id" id="customRadio<?php echo $c['id']; ?>" value="<?php echo $c['id']; ?>" class="custom-control-input" <?php echo $c['id']== $current['category_id'] ?"checked":"" ; ?> >                                      
                                        <label class="custom-control-label" for="customRadio<?php echo $c['id']; ?>"><?php echo $c['title']; ?></label>  
                                        </div>
                                    <?php } ?>
                                    
                        </div>
                        <button class="btn btn-primary" name="updatePost">Add Post</button>
                        </div>
                    </div>
               
                
            </form>
           


<?php include "template/footer.php" ?>


<script>
    $("#description").summernote({
        height:400,
        tabsize: 2,
    });
</script>