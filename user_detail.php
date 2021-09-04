<?php require_once "core/auth.php" ?>
<?php include "template/header.php" ?>
<?php 
    $id = $_GET['id'];
    $current = user($id);
?>

            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb bg-white mb-4">
                            <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                            <li class="breadcrumb-item"><a href="post_list.php">User</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><?php echo $current['name'] ?></li>
                        </ol>
                    </nav>
                </div>
            </div> 
            <div class="row">
            
            <div class="col-12">
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


                            ?>

                           <div class="d-md-flex justify-content-between align-item-center">
                           <p><i class="mr-2 feather-user text-primary"></i>User Name: <?php echo $current['name']; ?></p>
                            <p><i class="mr-2 feather-mail text-primary"></i>User Email: <?php echo $current['email']; ?></p>                  
                            <p><i class="mr-2 feather-link text-primary"></i>User Role: <?php echo $role[$current['role']]; ?></p>
                              
                           </div>   
                                                       

                      </div>
                    </div>
                </div>

            <div class="col-12">
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
                            <tr onclick="go('post_detail.php?id=<?php echo $v['post_id']; ?>')">
                                <td class="text-nowrap text-capitalize">
                                    <?php 
                                        echo short(post($v['post_id'])['title']);
                                     ?>
                                </td>
                                <td><?php echo $v['device']; ?></td>
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
