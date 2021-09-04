<?php

require_once 'core/auth.php';
require_once "core/isEditor&Admin.php";
require_once 'core/base.php';
require_once 'core/function.php';

$id = $_GET['id'];

if(adsDelete($id)){

    redirect('ads_list.php');
}

?>