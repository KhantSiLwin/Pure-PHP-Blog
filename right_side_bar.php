<div class="col-12 col-md-4 right-side-bar d-none d-md-block">
            <div class="front-panel-right-sidebar">

            <div class="card mb-3">
                <div class="card-body">
                <?php if(isset($_SESSION['user']['id'])){ ?>
                    <p>Hi <b><?php echo $_SESSION['user']['name']; ?></b></p>
                    <a href="<?php echo $url; ?>dashboard.php" class="btn btn-primary">Go Dashboard <i class="feather-arrow-right-circle"></i></a>
                <?php }else{ ?>
                    <p>Hi <b>Guest</b></p>
                    <a href="<?php echo $url; ?>register.php" class="btn btn-primary">Register Here</a>
                <?php } ?>
                </div>
            </div>
            <h4>Category List</h4>
            <div class="list-group mb-4">
            <a href="<?php echo $url; ?>index.php" class="list-group-item list-group-item-action <?php echo isset($_GET['category_id']) ? '':'active'; ?>">All Categories </a>
                <?php foreach (fCategories() as $c){?>
                   <a href="category_based_post.php?category_id=<?php echo $c['id']; ?>" 
                   class="list-group-item list-group-item-action <?php echo isset($_GET['category_id']) ? $_GET['category_id']==$c['id']?  "active":'':''; ?>">
                   <?php if($c['ordering']==1){ ?>
                   <i class="feather-paperclip text-primary"></i>
                   <?php } ?>
                   <?php echo $c['title'] ?> </a>
                <?php } ?> 
            </div>
          
           

           <div class="">
                    <h4>Search By Date</h4>
                    <div class="card">
                        <div class="card-body">
                            <form action="searchByDate.php" method="Post">
                                <div class="form-group">
                                    <label for="">Start Date</label>
                                    <input type="date" name="start" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Start Date</label>
                                    <input type="date" name="end" class="form-control" required>
                                </div>
                                <button class="btn btn-primary">
                                    <i class="feather-calendar">Search</i>
                                </button>
                            </form>
                        </div>
                    </div>
           </div>
        </div>
</div>