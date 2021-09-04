<?php require_once "front_panel/head.php";?>
<title>Home</title>
<?php require_once "front_panel/side_header.php";?>

<div class="container">
    <div class="row">
        <div class="col-12 col-md-8">
        <nav aria-label="breadcrumb">
                        <ol class="breadcrumb bg-white mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Search BY &nbsp; <b>"<?php echo $_POST['search_key'] ?>"</b></li>
                        </ol>
         </nav>
            <div class="">
            <?php
            $result = fSearch($_POST['search_key']);
            if (count($result)==0) {  
                echo alert("There is no results...","warning");
              } ?>
            <?php foreach (fSearch($_POST['search_key']) as $p){?>               
                <?php include "single.php";?>

                 <?php } ?>
            </div>
        </div>
                <?php require_once "right_side_bar.php" ?>
    </div>
</div>

<?php require_once "front_panel/footer.php";?>