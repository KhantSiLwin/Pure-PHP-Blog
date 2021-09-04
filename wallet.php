<?php require_once "core/auth.php" ?>
<?php include "template/header.php" ?>
<?php
if(isset($_POST['payNow'])){

    if(payNow()){
        linkTo("wallet.php");
    }
}

?>

            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb bg-white mb-4">
                            <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Wallet</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-xl-10">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <h4 class="mb-0">
                                    <i class="feather-dollar-sign text-primary"></i> My Wallet
                                </h4>
                                <a href="#" class="btn btn-outline-primary">
                                    <i class="feather-user">Your Money: $<?php echo user($_SESSION['user']['id'])['money'] ?></i>
                                </a>
                                
                            </div>
                            <hr>


                            <form method="post">

                                <div class="form-inline">
                                    <select name="to_user" class="custom-select mr-2" id="" required>
                                        <option value="0" selected disabled default>Select User</option>
                                        <?php foreach (users() as $u){ ?>
                                           <?php if($u['id'] != $_SESSION['user']['id']){ ?>
                                            <option value="<?php echo $u['id'] ?>" required><?php echo $u['name'] ?></option>
                                            <?php } ?>
                                        <?php } ?>
                                    </select>

                                    <input type="number" name="amount" placeholder="amount" min="100" max="<?php echo user($_SESSION['user']['id'])['money'] ?>" class="form-control mr-2" id="" required>
                                    <input type="text" name="description" placeholder="For What" class="form-control mr-2" id="" required>
                                    <button class="btn btn-primary ml-md-2 form-control mt-2 mt-md-0" name="payNow">Pay Now</button>
                                </div>
                               
                            </form>

                            <hr>

                            <table class="table table-hover table-responsive mt-3">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>From</th>
                                    <th>To</th>
                                    <th>Amount</th>
                                    <th>For What</th>
                                    <th>Date/Time</th>
                                </tr>
                                </thead>

                                <tbody>
                                <?php
                                foreach(transitions() as $t){
                                    ?>

                                    <tr>
                                        <td><?php echo $t['id']; ?></td>
                                        <td><?php echo user($t['from_user'])['name']; ?></td>
                                        <td><?php echo user($t['to_user'])['name']; ?></td>
                                        <td><?php echo "$".$t['amount']; ?></td>
                                        <td><?php echo $t['description']; ?></td>
                                        <td class="text-nowrap"><?php echo showTime($t['created_at'],"d-m-Y / h:i"); ?></td>
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
