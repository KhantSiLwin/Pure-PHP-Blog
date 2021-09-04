<?php require_once "core/auth.php" ?>
<?php require_once "core/isAdmin.php" ?>
<?php include "template/header.php" ?>


            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb bg-white mb-4">
                            <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Viewers List</li>
                        </ol>
                    </nav>
                </div>
            </div> 
            
         <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                                <h4 class="mb-0">
                                    <i class="feather-heart text-primary"></i> Visitors
                                </h4>
                               <div class="">
                               <a href="#" class="btn btn-outline-primary full-screen-btn">
                                        <i class="feather-maximize-2"></i>
                                </a>
                                </div>
                            </div>
               <hr>
                    <table class="table table-border table-hover table-responsive">
                        <thead>
                            <tr>
                                <th>Who</th>
                                <th>Post</th>
                                <th>Device</th>
                                <th>Time</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach(viewers() as $v){ ?>
                            <tr onclick="go('post_detail.php?id=<?php echo $v['post_id']; ?>')">
                                <td class="text-nowrap text-capitalize">
                                    <?php  if($v['user_id']==0){
                                        echo "Guest";
                                    }else{
                                        echo user($v['user_id'])['name'];
                                    }
                                     ?>
                                </td>
                                <td><?php echo short(post($v['post_id'])['title']); ?></td>
                                <td><?php echo short($v['device'],30); ?></td>
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
        "order":[[3,"desc"]]
    });
</script>