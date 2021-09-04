  <!-- sidebar start -->
  <div class="col-12 col-lg-3 col-xl-2 vh-100 sidebar">
                <div class="d-flex justify-content-between align-items-center py-2 mt-3 nav-brand">
                        <div class=" d-flex justify-content-center align-items-center">
                            <span class="bg-primary p-2 d-flex mx-2 justify-content-center align-items-center rounded">
                                <i class="feather-list text-light"></i>
                            </span>
                            <span class="font-weight-bolder text-uppercase text-primary mb-0 h4">My Blog</span>
                        </div>
                    <button class="hide-sidebar-btn btn btn-light d-block d-lg-none">
                        <i class="feather-x text-primary"  style="font-size: 2em;"></i>
                    </button>
                </div>
                <div class="nav-menu">
                    <ul>
                        <li class="menu-item">
                            <a href="<?php echo $url; ?>dashboard.php" class="menu-item-link">
                                <span>
                                    <i class="feather-home"></i>
                                    Dashboard
                                </span>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="<?php echo $url; ?>index.php" class="menu-item-link">
                                <span>
                                    <i class="feather-arrow-left-circle"></i>
                                    GO to News
                                </span>
                            </a>
                        </li>

                        <li class="menu-item">
                            <a href="<?php echo $url; ?>wallet.php" class="menu-item-link">
                                <span>
                                    <i class="feather-dollar-sign"></i>
                                    Wallet
                                </span>
                            </a>
                        </li>

                        <li class="menu-spacer"></li>
    
    
    
                        <li class="menu-title">
                            <span>Manage Post</span>
                        </li>

                        <li class="menu-item">
                            <a href="<?php echo $url; ?>post_add.php" class="menu-item-link">
                                <span>
                                    <i class="feather-plus-circle"></i>
                                    Add Post
                                </span>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="<?php echo $url; ?>post_list.php" class="menu-item-link">
                                <span>
                                    <i class="feather-list"></i>
                                    Post List
                                </span>
                                <span class="counter-up badge badge-pill bg-white shadow-sm text-primary p-1">  <?php echo countTotal("post") ?></span>
                            </a>
                        </li>

                        <li class="menu-spacer"></li>
                        
                        <?php 

                            if($_SESSION['user']['role'] <= 1){
                        
                        ?>

                                <li class="menu-title">
                                    <span>Manage Ads</span>
                                </li>

                                <li class="menu-item">
                                    <a href="<?php echo $url; ?>ads_add.php" class="menu-item-link">
                                <span>
                                    <i class="feather-git-pull-request"></i>
                                    Add Ads
                                </span>
                                    </a>
                                </li>
                                <li class="menu-item">
                                    <a href="<?php echo $url; ?>ads_list.php" class="menu-item-link">
                                <span>
                                    <i class="feather-database"></i>
                                    Ads List
                                </span>
                                        <span class="counter-up badge badge-pill bg-white shadow-sm text-primary p-1">  <?php echo countTotal("ad") ?></span>
                                    </a>
                                </li>

                                <li class="menu-spacer"></li>

                        <li class="menu-title">
                            <span>Setting</span>
                        </li>
                        

                        <li class="menu-item">
                            <a href="<?php echo $url; ?>category_add.php" class="menu-item-link">
                                <span class="text-nowrap">
                                    <i class="feather-layers"></i>
                                    Category Manager
                                </span>
                                <span class="counter-up badge badge-pill bg-white shadow-sm text-primary p-1">  <?php echo countTotal("categories") ?></span>

                            </a>
                        </li>



                        <?php 

                            if($_SESSION['user']['role'] == 0){

                        ?>
                        <li class="menu-item">
                            <a href="<?php echo $url; ?>user_list.php" class="menu-item-link">
                                <span>
                                    <i class="feather-users"></i>
                                    User Manager
                                </span>
                                <span class="counter-up badge badge-pill bg-white shadow-sm text-primary p-1">  <?php echo countTotal("users") ?></span>

                            </a>
                        </li>

                        <li class="menu-item">
                            <a href="<?php echo $url; ?>viewers_list.php" class="menu-item-link">
                                <span>
                                    <i class="feather-users"></i>
                                    Visitors List
                                </span>
                                <span class="counter-up badge badge-pill bg-white shadow-sm text-primary p-1">  <?php echo countTotal("viewers") ?></span>

                            </a>
                        </li>
                        
                        <?php } ?>
                        <li class="menu-spacer"></li>

                        <?php } ?>

                        <li class="menu-item">
                            <a href="<?php echo $url; ?>logout.php" class="btn btn-danger w-100">
                                <span>
                                    <i class="feather-log-out"></i>
                                     Log out
                                </span>
                               
                            </a>
                        </li>

                        <button class="btn btn-dark mt-2 w-100" onclick="changelMode()">
                                <span>
                                    <i class="feather-moon"></i>
                                     Dark Mode(UC)
                                </span>
                        </button>
    
    
    
                    </ul>
                </div>
           </div>
            <!-- sidebar end -->