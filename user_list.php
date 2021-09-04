<?php require_once "core/auth.php" ?>
<?php require_once "core/isAdmin.php" ?>
<?php include "template/header.php" ?>


            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb bg-white mb-4">
                            <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">User </li>
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
                                    <i class="feather-users text-primary"></i> User List
                                </h4>
                              <div class="">
                              <a href="register.php" class="btn btn-outline-primary ">
                                        <i class="feather-plus"></i>
                                </a>
                                <a href="#" class="btn btn-outline-primary full-screen-btn">
                                        <i class="feather-maximize-2"></i>
                                </a>
                              </div>
                            </div>
                            <hr>
  
                        
            <table class="table table-hover table-responsive mt-3">
                <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Money</th>
                            <th>Photo</th>
                            <th class="text-nowrap">Total Post</th>
                            <th>Control</th>
                            <th>Created</th>
                        </tr>
                </thead>

                <tbody>
                        <?php 
                            foreach(users() as $c) {
                                $uid=$c['id'];
                        ?>

                        <tr>
                                <td><?php echo $c['id']; ?></td>
                                <td><?php echo $c['name']; ?></td>
                                <td><?php echo $c['email']; ?></td>
                                <td><?php echo $role[$c['role']]; ?></td>
                                <td><?php echo "$".$c['money']; ?></td>
                                <td onclick="go(`<?php echo $url.$c['photo'] ?>`)"><img src="<?php echo $url.$c['photo'] ?>" class="user-img shadow-sm" alt=""></td>
                                <td><?php echo countTotal('post',"user_id='$uid'"); ?></td>
                                <td class="text-nowrap">
                               <a href="user_detail.php?id=<?php echo $c['id']; ?>" class="btn btn-outline-info btn-sm "><i class="feather-info fa-fw"></i></a>
                                    <a href="user_delete.php?id=<?php echo $c['id']; ?>"
                                    onclick="return confirm('Are you sure 😒️😒️');"
                                    class="btn btn-outline-danger btn-sm "><i class="feather-trash-2 fa-fw"></i></a>
                                    <a href="user_edit.php?id=<?php echo $c['id']; ?>" class="btn btn-outline-warning btn-sm "><i class="feather-edit-2 fa-fw"></i></a>
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
        "order":[[3,"asc"]]
    });
</script>