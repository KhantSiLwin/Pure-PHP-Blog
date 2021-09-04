<?php

function con(){

    return mysqli_connect("localhost","root","","blog");
  }

$info= array(

    "name" => "Noel'blog",
    "short" => 'Noblog',
    "description" => "Next level Hacker blog.."
);
  
$role =["Admin","Editor","User"];

$url = "http://{$_SERVER['HTTP_HOST']}/web-projects/sample_blog/";

date_default_timezone_set('Asia/Yangon');
?>
