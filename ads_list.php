<?php require_once "core/auth.php" ?>
<?php require_once "core/isEditor&Admin.php" ?>
<?php include "template/header.php" ?>


<div class="row">
    <div class="col-12">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-white mb-4">
                <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                <li class="breadcrumb-item"><a href="ads_add.php">Ads</a></li>
                <li class="breadcrumb-item active" aria-current="page">Ads List</li>
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
                        <i class="feather-database text-primary"></i> Ads List
                    </h4>
                    <div class="">
                        <a href="ads_add.php" class="btn btn-outline-primary">
                            <i class="feather-git-pull-request"></i>
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
                        <th>Name</th>
                        <th>Photo</th>
                        <th>Link</th>
                        <th class="text-nowrap">Start Date</th>
                        <th class="text-nowrap">End Date</th>
                        <th>Status</th>
                        <th>Control</th>
                        <th>Created</th>
                    </tr>
                    </thead>

                    <tbody>
                    <?php
                    foreach(adsforlist() as $ad) {
                        ?>

                        <tr>
                            <td><?php echo $ad['id']; ?></td>
                            <td><?php echo short($ad['owner_name'],7); ?></td>
                            <td><?php echo short($ad['photo'],21); ?></td>
                            <td><?php echo short($ad['link'],10); ?></td>
                            <td class="text-nowrap"><?php echo $ad['start']; ?></td>
                            <td class="text-nowrap"><?php echo $ad['end']; ?></td>
                            <td><?php 
                            $today = date("Y-m-d");
                            if ($ad['start'] <= $today AND  $ad['end'] > $today) {
                                echo "<p class='text-danger text-center'>Live</p>";
                            }else{
                               if ($ad['start'] > $today ) {
                                echo "<p class='text-info text-center'>iComming</p>";
                               }
                               if ($ad['end'] <= $today) {
                                echo "<p class='text-black-50 text-center'>Expired</p>";
                               }
                            }
                             ?></td>
                            <td class="text-nowrap">
                            <a href="ads_detail.php?id=<?php echo $ad['id']; ?>" class="btn btn-outline-info btn-sm "><i class="feather-info fa-fw"></i></a>
                                <a href="ads_delete.php?id=<?php echo $ad['id']; ?>"
                                   onclick="return confirm('Are you sure 😒️😒️');"
                                   class="btn btn-outline-danger btn-sm "><i class="feather-trash-2 fa-fw"></i></a>
                                <a href="ads_edit.php?id=<?php echo $ad['id']; ?>" class="btn btn-outline-warning btn-sm "><i class="feather-edit-2 fa-fw"></i></a>
                            </td>
                            <td class="text-nowrap"><?php echo showTime($ad['created_at']); ?></td>
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
        "order":[[6,"desc"]]
    });
</script>
