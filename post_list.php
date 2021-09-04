<?php require_once "core/auth.php" ?>
<?php include "template/header.php" ?>


            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb bg-white mb-4">
                            <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                            <li class="breadcrumb-item"><a href="post_add.php">Post</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Post List</li>
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
                                    <i class="feather-list text-primary"></i> Post List
                                </h4>
                               <div class=""> 
                               <a href="post_add.php" class="btn btn-outline-primary">
                                    <i class="feather-plus-circle"></i>
                                </a>
                               <a href="#" class="btn btn-outline-primary full-screen-btn">
                                        <i class="feather-maximize-2"></i>
                                </a> 
                                </div>
                            </div>
                            <hr>
  
                        
            <table class="table table-hover table-bordered table-responsive mt-3">
                <thead>
                        <tr>
                            <th>Id</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Category</th>
                           <?php
                             if($_SESSION['user']['role'] == 0){
                            ?>
                            <th>User</th>
                            <?php } ?>
                            <th>Viewer Count</th>
                            <th>Control</th>
                            <th>Created</th>
                        </tr>
                </thead>

                <tbody>
                        <?php 
                            foreach(posts() as $c) {
                        ?>

                        <tr onclick="go('post_detail.php?id=<?php echo $c['id']; ?>')">
                                <td><?php echo $c['id']; ?></td>
                                <td><?php echo short($c['title']); ?></td>
                                <td><?php echo short(strip_tags(html_entity_decode($c['description']))); ?></td>
                                <td class="text-nowrap" ><?php echo category($c['category_id'])['title']; ?></td>
                                <?php
                                    if($_SESSION['user']['role'] == 0){
                                ?>
                                <td><?php echo user($c['user_id'])['name']; ?></td>
                                <?php } ?>
                                <td>
                                <?php echo count(viewerCountBYPost($c['id'])); ?>
                                </td>
                                <td class="text-nowrap">
                                    <a href="post_detail.php?id=<?php echo $c['id']; ?>" class="btn btn-outline-info btn-sm "><i class="feather-info fa-fw"></i></a>
                                    <a href="post_delete.php?id=<?php echo $c['id']; ?>"
                                    onclick="return confirm('Are you sure 😒️😒️');"
                                    class="btn btn-outline-danger btn-sm "><i class="feather-trash-2 fa-fw"></i></a>
                                    <a href="post_edit.php?id=<?php echo $c['id']; ?>" class="btn btn-outline-warning btn-sm "><i class="feather-edit-2 fa-fw"></i></a>
                                </td>
                                <td class="text-nowrap"><?php echo showTime($c['created_at']); ?></td>
                        </tr>

                        <?php
                        }
                        ?>
                </tbody>
            </table>          

                      </div>
                    </div>
                </div>
            </div>


<?php include "template/footer.php" ?>

<script>
    $(".table").dataTable({
        "order":[[0,"desc"]]
    });
</script>
