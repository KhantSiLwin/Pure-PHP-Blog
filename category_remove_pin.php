<?php

require_once 'core/auth.php';
require_once 'core/base.php';
require_once 'core/function.php';


if(categoryRemovePin()){

        redirect('category_add.php');
}

?>