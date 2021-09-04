</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-12">
            <nav class="navbar navbar-expand-md navbar-dark bg-primary my-3 rounded">
                <a class="navbar-brand" href="<?php echo $url; ?>/index.php">Noel's Blog</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse d-md-flex justify-content-end" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto d-block d-md-none">
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                        <div class="card mb-3">
                            <div class="card-body">
                            <?php if(isset($_SESSION['user']['id'])){ ?>
                                <p>Hi <b><?php echo $_SESSION['user']['name']; ?></b></p>
                                <a href="<?php echo $url; ?>dashboard.php" class="btn btn-primary">Go Dashboard <i class="feather-arrow-right-circle"></i></a>
                            <?php }else{ ?>
                                <p>Hi <b>Guest</b></p>
                                <a href="<?php echo $url; ?>register.php" class="btn btn-primary">Register Here</a>
                            <?php } ?>
                            </div>
                        </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Category Lists
                            </a>
                            <div class="dropdown-menu mt-0 pt-0" aria-labelledby="navbarDropdown">
                            <div class="list-group mb-4">
                                <a href="<?php echo $url; ?>index.php" class="list-group-item list-group-item-action <?php echo isset($_GET['category_id']) ? '':'active'; ?>">All Categories </a>
                                <?php foreach (fCategories() as $c){?>
                                <a href="category_based_post.php?category_id=<?php echo $c['id']; ?>" 
                                class="list-group-item list-group-item-action <?php echo isset($_GET['category_id']) ? $_GET['category_id']==$c['id']?  "active":'':''; ?>">
                                <?php if($c['ordering']==1){ ?>
                                <i class="feather-paperclip text-primary"></i>
                                <?php } ?>
                                <?php echo $c['title'] ?> </a>
                                <?php } ?> 
                            </div>
                            </div>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                 Search By Date
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <div class="card">
                                    <div class="card-body">
                                        <form action="searchByDate.php" method="Post">
                                            <div class="form-group">
                                                <label for="">Start Date</label>
                                                <input type="date" name="start" class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Start Date</label>
                                                <input type="date" name="end" class="form-control" required>
                                            </div>
                                            <button class="btn btn-primary">
                                                <i class="feather-calendar">Search</i>
                                            </button>
                                        </form>
                                </div>
                             </div>
                            </div>
                        </li>
                        
                    </ul>
                    <form class="form-inline my-2 my-lg-0" method="post" action="<?php echo $url; ?>search.php">
                        <input class="form-control w-50 mr-2" type="search" name="search_key" placeholder="Search" aria-label="Search">
                        <button class="btn btn-light my-2 my-sm-0" type="submit">Search</button>
                    </form>
                </div>
            </nav>

        </div>
         <div class="col-12">
                <a href="<?php print_r(ads()[0]['link']) ?>" target="_blank">
                    <img src="<?php print_r(ads()[0]['photo']) ?>" alt="" class="w-100 mb-4 rounded shadow">
                </a>

        </div>
