<?php

//common start

    function alert($data,$color="danger"){

        return "<p class='alert alert-$color'>$data</p>";
    }

    function run_query($sql){
        $con = con();
        if(mysqli_query($con,$sql)){

            return true;
        }
        else{

            die(mysqli_error($con));
        }
    }

    function redirect($l){

        header("location:$l");
    }

    function linkTo($l){

        echo "<script>location.href='$l'</script>";
    }

    function showTime($timestamp,$format = "d-m-y"){

        return date($format,strtotime($timestamp));
    }

    function fetch($sql){

        $query = mysqli_query(con(),$sql);
        $row = mysqli_fetch_assoc($query);
        return $row;
    }


    function fetchAll($sql){

        $query = mysqli_query(con(),$sql);
        $rows=[];
        if(!$query){
            echo "fail:".mysqli_error(con());
        }
        while ($row=mysqli_fetch_assoc($query)) {
            array_push($rows,$row);
        }
        return $rows;
    }

    function short($str,$length="100"){

        return substr($str,0,$length)."...";
       
    }

    // function shoooooort($str){

    //     if ($str > 50) {
    //         return substr($str,0,50)."...";
    //     }
    // }
    
    function textfilter($text){

        $text = trim($text);
        $text = htmlentities($text,ENT_QUOTES);
        $text =stripslashes($text);
        return $text;

    }

//common end

//user start

    function user($id){

        $sql = "SELECT * FROM users WHERE id=$id";
        return fetch($sql);
    }

    function users($limit="9999"){

        $sql = "SELECT * FROM users LIMIT $limit";
        return fetchAll($sql);
    }

    function userEdit(){
        
        $name = $_POST['name'];
        $email = $_POST['email'];
        $role = $_POST['role'];
        $id = $_POST['id'];
        $sql = "UPDATE  users SET name='$name' ,email='$email',role='$role' WHERE id=$id";
        return run_query($sql);
    }

    function userDelete($id){

        $sql = "DELETE FROM users  WHERE id=$id";
        return run_query($sql);
    }

    function userDetail(){

        $sql = "SELECT * FROM users";
        return fetchAll($sql);
    }


    function updateProfile($id){

        $id = $_POST['id'];
        $name = $_POST['name'];
        $email = $_POST['email'];
       if ($_FILES['upload']['tmp_name']) {
            
        $tempFile = $_FILES['upload']['tmp_name'];
        $fileName = $_FILES['upload']['name'];
        $saveFolder = "store/";
        $newName =  $saveFolder.uniqid()."_".$fileName;
        move_uploaded_file($tempFile, $newName);
        $_SESSION['user']['name'] = $name;
        $_SESSION['user']['email'] = $email;       
        $_SESSION['user']['photo'] = $newName;
            $sql = "UPDATE  users SET name='$name' ,email='$email',photo='$newName' WHERE id=$id";
            return run_query($sql);

       }else{

        $_SESSION['user']['name'] = $name;
        $_SESSION['user']['email'] = $email; 
        $sql = "UPDATE  users SET name='$name' ,email='$email'
         WHERE id=$id";
        return run_query($sql);

       }

    }

//user end

//auth start

function register(){

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];


    $sql ="SELECT * FROM users WHERE email='$email'";
    $query =mysqli_query(con(),$sql);
    $row =mysqli_fetch_assoc($query);

    if(!$row){
        if($password == $cpassword){
        $sPass = password_hash($password,PASSWORD_DEFAULT);
        $sql = "INSERT INTO users(name,email,password) VALUES('$name','$email','$sPass')";
       
        if( run_query($sql)){

            redirect("login.php");
        }

    }
        else{

            echo alert("Password don't match");
        }
        
    }
    else{
        echo alert("Email already Exist..");
    }
}

    function login(){
        
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql ="SELECT * FROM users WHERE email='$email'";
    $query =mysqli_query(con(),$sql);
    $row =mysqli_fetch_assoc($query);

    if(!$row){

        echo alert("Email or Password don't match");
    }
    else{
        if(!password_verify($password,$row['password'])){
            return alert("Email or Password don't match");
            // print_r($row);
        }
        else{
          
            session_start();
            $_SESSION['user'] = $row;
            header("location:dashboard.php");

        }
    }


    }

//auth end


//category start

    function categoryadd(){

        $title = $_POST['title'];
        $user_id= $_SESSION['user']['id'];

        $sql = "INSERT INTO categories(title,user_id) VALUES ('$title','$user_id')";
    
        if( run_query($sql)){

            linkTo("category_add.php");
        }
    }

    function category($id){

        $sql = "SELECT * FROM categories WHERE id=$id";
        return fetch($sql);
    }

    function categories(){

        $sql = "SELECT * FROM categories ORDER BY ordering DESC";
        return fetchAll($sql);
    }

    function categoryDelete($id){

        $sql = "DELETE FROM categories  WHERE id=$id";
        return run_query($sql);
    }

    function categoryUpdate(){

        $title = $_POST['title'];
        $id = $_POST['id'];
        $sql = "UPDATE  categories SET title='$title' WHERE id=$id";
        return run_query($sql);
    }

    function categoryPinToTop($id){

        $sql = "UPDATE  categories SET ordering='0'";
        mysqli_query(con(),$sql);
        $sql = "UPDATE  categories SET ordering='1' WHERE id=$id";
        return run_query($sql);
    }

    function categoryRemovePin(){


        $sql = "UPDATE  categories SET ordering='0'";
        return run_query($sql);
    }

//category end

//post start

function postadd(){

    $title = textfilter($_POST['title']);
    $description = textfilter($_POST['description']);
    $category_id = $_POST['category_id'];
    $user_id= $_SESSION['user']['id'];

    $sql = "INSERT INTO post(title,description,user_id,category_id) VALUES ('$title','$description','$user_id','$category_id')";

    if( run_query($sql)){

        linkTo("post_add.php");
    }
 
}

function post($id){

    $sql = "SELECT * FROM post WHERE id=$id";
    return fetch($sql);
}

function posts(){
    if($_SESSION['user']['role'] == 2){
        $current_user_id =  $_SESSION['user']['id'];
        $sql = "SELECT * FROM post WHERE user_id='$current_user_id'";
    }else {
        $sql = "SELECT * FROM post";
    }
    return fetchAll($sql);
}

function postDelete($id){

    $sql = "DELETE FROM post  WHERE id=$id";
    return run_query($sql);
}

function postUpdate(){

     $title = textfilter($_POST['title']);
    $description = textfilter($_POST['description']);
    $category_id = $_POST['category_id'];
    $id= $_POST['id'];
    $sql = "UPDATE  post SET title='$title',description='$description',category_id='$category_id' WHERE id=$id";
    return run_query($sql);
}

function countTotal($total,$condition=1){
    

    if($_SESSION['user']['role'] == 2){
       
        $current_user_id =  $_SESSION['user']['id'];
        $sql ="SELECT COUNT(id) FROM $total WHERE user_id='$current_user_id'";
    }else {
        $sql =" SELECT COUNT(id) FROM $total WHERE $condition";
    }
    
    $total = fetch($sql);
    return  $total['COUNT(id)'];
}

//post end

//front panel start

function fPosts($orderCol="id",$orderType="DESC"){
  
        $sql = "SELECT * FROM post ORDER BY $orderCol $orderType";
   
    return fetchAll($sql);
}

function fCategories(){
  
    $sql = "SELECT * FROM categories ORDER BY ordering DESC";

return fetchAll($sql);
}

function fPostByCat($category_id,$limit="9999",$post_id=0){
  
    $sql = "SELECT * FROM post WHERE category_id=$category_id AND id!=$post_id ORDER BY id DESC LIMIT $limit";
    return fetchAll($sql);
}


function fSearch($searchKey){
    $sql = "SELECT * FROM post WHERE title LIKE '%$searchKey%' OR description LIKE '%$searchKey%' ORDER BY id DESC";

    return fetchAll($sql);
}


function fSearchByDate($start,$end){

    $sql = "SELECT * FROM post WHERE created_at BETWEEN '$start' AND  '$end'  ORDER BY id DESC";
    return fetchAll($sql);
}

//front panel end

// viewer count start

function viewerRecord($userId,$postId,$device){
    
    $sql = "INSERT INTO viewers (user_id,post_id,device) VALUES ('$userId','$postId','$device')";
    run_query($sql);
}

function viewers(){

    $sql =" SELECT * FROM viewers";
    return fetchAll($sql);
}


function viewerCountBYPost($postId){

    $sql =" SELECT * FROM viewers WHERE post_id=$postId";
    return fetchAll($sql);
}

function viewerCountBYUser($userId){

    $sql =" SELECT * FROM viewers WHERE user_id=$userId";
    return fetchAll($sql);
}

// viewer count start

//ads start

function adsadd(){

    $adsName = $_POST['adsName'];
    $weblink = $_POST['weblink'];
    $start = $_POST['startdate'];
    $end = $_POST['enddate'];

    if ($_FILES['upload']['tmp_name']) {
            
        $tempFile = $_FILES['upload']['tmp_name'];
        $fileName = $_FILES['upload']['name'];
        $saveFolder = "adstore/";
        $newName =  $saveFolder.uniqid()."_".$fileName;
        move_uploaded_file($tempFile, $newName);
        
        $sql = "INSERT INTO ad(owner_name,photo,link,start,end) VALUES ('$adsName','$newName','$weblink','$start','$end')";
        
        if( run_query($sql)){
    
            linkTo("ads_add.php");
        }
    
       }


    else{
        $photolink = $_POST['photolink'];
        $sql = "INSERT INTO ad(owner_name,photo,link,start,end) VALUES ('$adsName','$photolink','$weblink','$start','$end')";
        
        if( run_query($sql)){
    
            linkTo("ads_add.php");
        }
    }
}





function ad($id){

    $sql = "SELECT * FROM ad WHERE id=$id";
    return fetch($sql);
}

function adsforlist(){

    $sql = "SELECT * FROM ad";
    return fetchAll($sql);
}

function ads(){
    $today = date("Y-m-d");
    $sql ="SELECT * FROM ad WHERE start <= '$today' AND end > '$today'";
    return fetchAll($sql);
}

function adsDelete($id){

    $sql = "DELETE FROM ad  WHERE id=$id";
    return run_query($sql);
}

function adsUpdate(){

    $id = $_POST['id'];
    $name = $_POST['adsName'];
    $weblink = $_POST['weblink'];
    $start = $_POST['startdate'];
    $end = $_POST['enddate'];

    if ($_FILES['upload']['tmp_name']) {
            
        $tempFile = $_FILES['upload']['tmp_name'];
        $fileName = $_FILES['upload']['name'];
        $saveFolder = "adstore/";
        $newName =  $saveFolder.uniqid()."_".$fileName;
        move_uploaded_file($tempFile, $newName);
        $sql = "UPDATE  ad SET owner_name='$name',photo='$newName',link='$weblink',start='$start',end='$end' WHERE id=$id";
        return run_query($sql);

    }else{
        $photo = $_POST['photolink'];
        $sql = "UPDATE  ad SET owner_name='$name',photo='$photo',link='$weblink',start='$start',end='$end' WHERE id=$id";
        return run_query($sql);
    }

}

//ads end

//payment start

function payNOw(){
    $from = $_SESSION['user']['id'];
    $to = $_POST['to_user'];
    $amount = $_POST['amount'];
    $description= $_POST['description'];

    //from user money update(-)
    $fromUserDetail = user($from);
    $leftMoney = $fromUserDetail['money']-$amount;
   if($fromUserDetail['money'] >= $amount || $fromUserDetail['money'] >= 0){
       $sql = "UPDATE users SET money=$leftMoney WHERE id=$from";
       mysqli_query(con(),$sql);

       //to user money update(+)
       $toUserDetail =user($to);
       $newMoney = $toUserDetail['money']+$amount;
       $sql = "UPDATE users SET money=$newMoney WHERE id=$to";
       mysqli_query(con(),$sql);

       //add to transitoion table
       $sql ="INSERT INTO transition (from_user,to_user,amount,description) VALUES ('$from','$to','$amount','$description')";
       run_query($sql);
   }
   else{
       echo alert("Error");
   }
}

function transition($id){

    $sql = "SELECT * FROM transition WHERE id=$id";
    return fetch($sql);
}

function transitions(){
    $userId= $_SESSION['user']['id'];
    if($_SESSION['user']['role']==0) {
        $sql = "SELECT * FROM transition";
        return fetchAll($sql);
    }
    else{
        $sql = "SELECT * FROM transition where from_user=$userId OR to_user=$userId";
        return fetchAll($sql);
    }
}

//payment end

?>