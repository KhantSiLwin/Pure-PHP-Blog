<?php require_once "core/auth.php" ?>

<?php include "template/header.php"; ?>



<div class="row">

<div class="col-12 col-md-6 col-lg-6 col-xl-3">
    <div class="card bg-white status-card mb-4" onclick="go('viewers_list.php')">
       <div class="card-body">
          <div class="row align-items-center">
              <div class="col-3">
                  <i class="feather-heart h1 text-primary"></i>
                </div>
                <div class="col-9">
                    <p class="mb-1 h4 font-weight-bolder">
                        <span class="counter-up"><?php echo countTotal('viewers') ?></span>
                    </p>
                    <p class="mb-0 text-black-50"> Total Visitors</p>
                </div>
          </div>
       </div>
     </div>
</div>

<div class="col-12 col-md-6 col-lg-6 col-xl-3">
    <div class="card bg-white status-card mb-4" onclick="go('<?php echo $url ?>post_list.php')">
       <div class="card-body">
          <div class="row align-items-center">
              <div class="col-3">
                  <i class="feather-list h1 text-primary"></i>
                </div>
                <div class="col-9">
                    <p class="mb-1 h4 font-weight-bolder">
                        <span class="counter-up"><?php echo countTotal('post') ?></span>
                    </p>
                    <p class="mb-0 text-black-50"> Total Posts</p>
                </div>
          </div>
       </div>
     </div>
</div>

<?php 

if($_SESSION['user']['role'] <= 1){

?>

<div class="col-12 col-md-6 col-lg-6 col-xl-3 "> 
    <div class="card bg-white status-card mb-4" onclick="go('<?php echo $url ?>category_add.php')">
       <div class="card-body">
          <div class="row align-items-center">
              <div class="col-3">
                  <i class="feather-layers h1 text-primary"></i>
                </div>
                <div class="col-9">
                    <p class="mb-1 h4 font-weight-bolder">
                        <span class="counter-up"><?php echo countTotal('categories') ?></span>
                    </p>
                    <p class="mb-0 text-black-50"> Total Categories</p>
                </div>
          </div>
       </div>
     </div>
</div>

<div class="col-12 col-md-6 col-lg-6 col-xl-3">
    <div class="card bg-white status-card mb-4" onclick="go('<?php echo $url ?>user_list.php')">
         <div class="card-body">
            <div class="row align-items-center">
                <div class="col-3">
                    <i class="feather-users h1 text-primary"></i>
                  </div>
                  <div class="col-9">
                      <p class="mb-1 h4 font-weight-bolder">
                          <span class="counter-up"><?php echo countTotal('users') ?></span>
                      </p>
                      <p class="mb-0 text-black-50"> Total Users</p>
                  </div>
            </div>
         </div>
       </div>
</div>

<?php } ?>

</div>

<div class="row">
                <?php if($_SESSION['user']['role'] <= 1){ ?>

                <div class="col-12 col-xl-7">
                    <div class="card overflow-hidden shadow mb-4">
                          <div class="chart">
                            <div class="d-flex justify-content-between align-items-center p-3">
                                <h4 class="mb-0">Visitors</h4>
                                <div class="">
                                    <?php foreach (users("6") as $u) { ?>
                                        <img src="<?php echo $url.$u['photo']?>" alt="<?php echo $u['name']?>" onclick="go(`<?php echo $url.'user_detail.php?id='.$u['id']?>`)" class="ov-image rounded-circle">
                                    <?php } ?> 
                                </div>
                            </div> 
                           
                           <canvas id="ov" height="137"></canvas>
                            </div> 
                        </div>
                </div>

                <div class="col-12 col-md-6 col-xl-5">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center p-3">
                                <h4 class="mb-0">Categories / Post</h4>
                                <div class="">
                                   <i class="feather-pie-chart h4 text-primary"></i>
                                </div>
                            </div>
                     <canvas id="op" height="200"></canvas>
                         </div>
                     </div>
                </div>

                <?php } ?>

                <div class="col-12">
                    <div class="card overflow-hidden mb-4">
                        <div class="">

                            <div class="d-flex justify-content-between align-items-center p-3">
                                <h4 class="mb-0 font-weight-bold">Recent Posts By Trending</h4>
                                <div class="">
                                    <?php
                                        $currentUserId = $_SESSION['user']['id'];
                                        $postTotal = countTotal("post");
                                        $currentUserPostTotal = countTotal("post","user_id=$currentUserId");
                                            if ($currentUserPostTotal>0) {
                                                $currentUserPostPercentage = ($currentUserPostTotal/$postTotal)*100;
                                                $finalPercentage = floor($currentUserPostPercentage);
                                            }

                                       
                                        ?>
                                    <small>Your Post : <?php echo $currentUserPostTotal; ?></small>
                                    <div class="progress" style="width: 300px;height: 8px;">
                                        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: <?php echo $finalPercentage; ?>%" aria-valuenow="18"></div>
                                    </div>
                                </div>
                            </div>
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

<?php include "template/footer.php"; ?>


<script src="<?php echo $url ?>assets/vendor/way_point/jquery.waypoints.min.js"></script>
<script src="<?php echo $url ?>assets/vendor/counter_up/counter_up.js"></script>
<script src="<?php echo $url ?>assets/vendor/chart_js/chart.min.js"></script>
<script src="<?php echo $url ?>assets/js/dashboard.js"></script>


<script>

    $(".table").dataTable({
        "order":[[5,"desc"]]
    });

<?php

$dateArr = [];
$visitorRate = [];
$transitionRate=[];

$today = date("Y-m-d");

for($i=0;$i<10;$i++){

    $date=date_create($today);

    date_sub($date,date_interval_create_from_date_string("$i days"));

    $current = date_format($date,"Y-m-d");

    array_push($dateArr,$current);

    $result = countTotal("viewers","CAST(created_at AS DATE) = '$current'");

    array_push($visitorRate,$result);

    $result2 = countTotal("transition","CAST(created_at AS DATE) = '$current'");

    array_push($transitionRate,$result2);


    
}


?>

let dateArr = <?php echo json_encode($dateArr); ?>;

let viewerCountArr = <?php echo json_encode($visitorRate); ?>;

let transitionCountArr = <?php echo json_encode($transitionRate); ?>;

let ov = document.getElementById('ov').getContext('2d');
let ovChart = new Chart(ov, {
    type: 'line',
    data: {
        labels: dateArr,
        datasets: [
            {
                label: 'Viewer Count',
                data: viewerCountArr,
                backgroundColor: [
                    '#007bff30',
                ],
                borderColor: [
                    '#007bff',
                ],
                borderWidth: 1,
                tension:0
            },
            {
                label: 'Transition Count',
                data: transitionCountArr,
                backgroundColor: [
                    '#ce7d7830',
                ],
                borderColor: [
                    '#ce7d78',
                ],
                borderWidth: 1,
                tension:0
            },
        ]
    },
    options: {
        scales: {
            yAxes: [{
                display:false,
                ticks: {
                    beginAtZero: true
                }
            }],
            xAxes:[
                {
                    display:false,
                    gridLines:[
                        {
                            display:false
                        }
                    ]
                }
            ]
        },
        legend:{
            display: true,
            shape:"circle",
            position: 'top',
            labels: {
                fontColor: '#333',
                usePointStyle:true
            }
        }
    }
});


<?php

 $catName=[];
 $countPostByCategory=[];
 foreach (categories() as $c) {
    array_push($catName,$c['title']);
    array_push($countPostByCategory,countTotal('post',"category_id={$c['id']}"));
 }

?>

let catArr = <?php echo json_encode($catName); ?>;
let countArr =<?php echo json_encode($countPostByCategory); ?>;

let op = document.getElementById('op').getContext('2d');
let opChart = new Chart(op, {
    type: 'doughnut',
    data: {
        labels:catArr,
        datasets: [{
            label: '# of Votes',
            data:countArr,
            backgroundColor:  [
"#63b59850", "#ce7d7850", "#ea9e7050", "#a48a9e50","#64817750","#0d5ac150",
"#f205e650","#14a9ad50","#4ca2f950","#a4e43f50","#d298e250","#6119d050",
"#d2737d50","#c0a43c50","#f2510e50","#651be650","#79806e50","#61da5e50","#cd2f0050",
"#9348af50","#01ac5350","#c5a4fb50","#99663550","#b1157350","#4bb47350","#75d89e50",
"#2f3f9450","#2f7b9950","#da967d50","#34891f50","#b0d87b50","#ca475150","#7e50a850",
"#c4d64750","#e0eeb850","#11dec150","#28981250","#566ca050","#ffdbe150","#2f117950",
"#935b6d50","#91698850","#513d9850","#aead3a50", "#9e6d7150", "#4b5bdc50", "#0cd36d50",
"#25066250", "#cb5bea50", "#22891650", "#ac3e1b50", "#df514a50", "#53939750", "#88097750",
"#f697c150", "#ba96ce50", "#679c9d50", "#c6c42c50", "#5d2c5250", "#48b41b50", "#e1cf3b50",
],
            borderColor: [
"#63b598", "#ce7d78", "#ea9e70", "#a48a9e","#648177" ,"#0d5ac1" ,
"#f205e6" ,"#14a9ad" ,"#4ca2f9" ,"#a4e43f" ,"#d298e2" ,"#6119d0",
"#d2737d" ,"#c0a43c" ,"#f2510e" ,"#651be6" ,"#79806e" ,"#61da5e" ,"#cd2f00" ,
"#9348af" ,"#01ac53" ,"#c5a4fb" ,"#996635","#b11573" ,"#4bb473" ,"#75d89e" ,
"#2f3f94" ,"#2f7b99" ,"#da967d" ,"#34891f" ,"#b0d87b" ,"#ca4751" ,"#7e50a8" ,
"#c4d647" ,"#e0eeb8" ,"#11dec1" ,"#289812" ,"#566ca0" ,"#ffdbe1" ,"#2f1179" ,
"#935b6d" ,"#916988" ,"#513d98" ,"#aead3a", "#9e6d71", "#4b5bdc", "#0cd36d",
"#250662", "#cb5bea", "#228916", "#ac3e1b", "#df514a", "#539397", "#880977",
"#f697c1", "#ba96ce", "#679c9d", "#c6c42c", "#5d2c52", "#48b41b", "#e1cf3b",

            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                display:false,
                ticks: {
                    beginAtZero: true
                }
            }],
            xAxes: [
                {
                    display:false
                }
            ]
        },
        legend:{
            display: true,
            position: 'bottom',
            labels: {
                fontColor: '#333',
                usePointStyle:true
            }
        }
    }
}); 

</script>