<?php $data3    = $controllerArticles->getLastArticles($articles,$category,'3');?>

   <!-- Sidebar Lateral Izquierdo -->
                        <aside id="sidebarLeft" class="sidebar medium-4 large-3 columns" role="complementary">
                            
                            <!-- Banner 300 x 250 -->
                            <div id="banner01" class="banner300 widget">
                                <div class="inner">
                                    <img src="http://pagead2.googlesyndication.com/simgad/6048895815123697583" alt="">
                                </div>
                            </div>
                            <!-- Destacados Categoría -->

                            <div id="tecnologiaCat" class="featuredCat widget">

                                <div class="inner">
                                    <figure>
                                        <img src="<?php echo $base_url?>/images/tecnologia.jpg" alt="" title="">
                                        <figcaption></figcaption>
                                    </figure>

                                    <div class="infoBox">
                                        <h3>Samsung Presenta</h3>
                                        <h2><a href="#"><?php echo $category?></a></h2>
                                        <a class="readmore" href="#">Ver Sección</a>
                                    </div>

                                    <ul class="titleCat">
                                     
                                        <li>
                                            <h4>
                                                <a href="single.html">Google Play estrenó una nueva sección para apps de Android Wear</a>
                                            </h4>
                                        </li>
                                       
                                    </ul>
                                </div>
                            </div>

                            <!-- Banner 300 x 250 -->
                            <div id="banner02" class="banner300 widget">
                                <div class="inner">
                                    <img src="http://pagead2.googlesyndication.com/simgad/11349783127905194115" alt="">
                                </div>
                            </div>

                            <!-- Destacados Categoría -->
                            <div id="startupCat" class="featuredCat widget">
                                <?php
                                 foreach ($data3 as $datatre) {

                                    $thumnails = $datatre['st_image_thump'];

                                    $title3    = $datatre['st_article_title'];
                                    $image     = $datatre['st_image_profile'];  
                                    $category3 = $datatre['st_category'];
                                    $editor3   = $datatre['st_uid_editor'];
                                    $date3     = $datatre['st_created'];
                                    $name3     = $datatre['st_name'];
                                ?>
                                <figure class="effect-sadie thumnails">
                                     <?php            
                                         $queryThumb = $controllerArticles->getThumnailArticle($thumnails);
                                        foreach ($queryThumb as $thum ) {
                                         $thumbnail = $thum['upload'];
                                         $thumnail = explode("/articles/",$thumbnail);
                                         $thumnail = $thumnail[0].'/articles/300_'.$thumnail[1];
                                         ?>
                                    <img src="<?php echo $thumnail; ?>">
                                    <?php }?>

                                    <figcaption>
                                        <h2><?php echo $title3 ?></h2>
                                        <a href="#">View more</a>
                                        
                                        <span data-livestamp="<?php echo $date3 ?>"></span>  
                                            <figure class="avatar">


                                                <img  src="<?php echo $image ?>">
                                            </figure>
                                        <p><?php echo $name3 ?></p>
                                        
                                    </figcaption>
                                    <div class="degrade"></div> 

       
                                </figure>

                                <?php  }?>
                            </div>

                        </aside>
