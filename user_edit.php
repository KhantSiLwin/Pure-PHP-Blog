<?php require_once "core/auth.php" ?>
<?php include "template/header.php" ?>


            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb bg-white mb-4">
                            <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Users</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-5">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <h4 class="mb-0">
                                    <i class="feather-users text-primary"></i> User Manager
                                </h4>
                                <a href="user_list.php" class="btn btn-outline-primary">
                                    <i class="feather-list"></i>
                                </a>
                            </div>
                            <hr>
                            <?php

                            $id = $_GET['id'];
                            $current = user($id);

                            if(isset($_POST['updateuserBtn'])){
                            
                                if (userEdit()) {
                                   linkTo('user_list.php');
                                }
                             }

                             ?>

                            <form method="post">
                        <div class="form-group">
                            <label for="name">
                                <i class="feather-user text-primary"></i>
                                 User Name:
                            </label>
                            <input type="hidden" value="<?php echo $id; ?>" name="id" >
                            <input type="text" name="name" class="form-control" id="" value="<?php echo $current['name']; ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="email">
                                <i class="feather-mail text-primary"></i>
                               User Email:
                            </label>
                            <input type="text" name="email" class="form-control" id="" value="<?php echo $current['email']; ?>" required>
                        </div>

                        <div class="form-group">
                       <div class="">
                       <label for="role">
                                <i class="feather-link text-primary"></i>
                              User Role:
                            </label>
                       </div>
                        <div class="form-inline">
                        <?php foreach($role as $key=>$c) { ?>
                                        <div class="custom-control custom-radio pr-2">
                                        <input type="radio" name="role" id="customRadio<?php echo $c; ?>" value="<?php echo $key; ?>" class="custom-control-input" <?php echo $key== $current['role'] ?"checked":"" ; ?> required>                                      
                                        <label class="custom-control-label" for="customRadio<?php echo $c; ?>"><?php echo $c; ?></label>  
                                        </div>
                                    <?php } ?>
                        </div>
                                    
                        </div>

                        <button class="btn btn-primary ml-2" name="updateuserBtn">Update User</button>
                            </form>
  
                        
                   

                      </div>
                    </div>
                </div>
                <div class="col-12 col-md-7">
                <div class="card">
                    <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                                <h4 class="mb-0">
                                    <i class="feather-info text-primary"></i> Visited Posts
                                </h4>
                               <div class="">
                               <a href="#" class="btn btn-outline-primary full-screen-btn">
                                        <i class="feather-maximize-2"></i>
                                </a>
                                </div>
                            </div>
                    </div>
                    <hr>
                    <table class="table table-border table-hover table-responsive">
                        <thead>
                            <tr>
                                <th>Post</th>
                                <th>Device</th>
                                <th>Time</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach(viewerCountBYUser($id) as $v){ ?>
                            <tr>
                                <td>
                                    <?php
                                        echo short(post($v['post_id'])['title']);
                                     ?>
                                </td>
                                <td class="text-nowrap"><?php echo short($v['device'],30); ?></td>
                                <td class="text-nowrap"><?php echo showTime($v['created_at']); ?></td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            </div>

            


<?php include "template/footer.php" ?>

<script>
    $(".table").dataTable({
        "order":[[0,"desc"]]
    });
</script>

                        </div>
                    </div>
                </div>
            </div>
           


<?php include "template/footer.php" ?>


