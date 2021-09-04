<div class="card shadow-sm mb-4 post" onclick="go('detail.php?id=<?php echo $p['id'] ?>')">
                    <div class="card-body">
                        <a href="detail.php?id=<?php echo $p['id'] ?>" class="text-dark">
                            <h4><?php echo $p['title'] ?></h4>
                        </a>
                        <div class="my-3">
                                <i class="feather-user text-primary"> </i>
                                <?php 
                                    echo user($p['user_id'])['name'];
                                ?>
                               
                                <i class="ml-2 feather-layers text-success"> </i>
                                <?php 
                                    echo category($p['category_id'])['title'];
                                ?>

                                <i class="ml-2 feather-calendar text-danger"> </i>
                                <?php 
                                     echo showTime($p['created_at'],$format= "j M y");
                                ?>
                               
                              </div>
                        <p class="text-black-50">
                         <?php echo short(strip_tags(html_entity_decode($p['description'])),200); ?>                   
                        </p>
                    </div>
                </div>