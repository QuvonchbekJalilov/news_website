<body class="single">
    <div class="container-fluid fh5co_header_bg">
        <div class="container">
            <div class="row">
                <div class="col-12 fh5co_mediya_center"><a href="#" class="color_fff fh5co_mediya_setting"><i class="fa fa-clock-o"></i>&nbsp;&nbsp;&nbsp;Friday, 5 January 2018</a>
                    <div class="d-inline-block fh5co_trading_posotion_relative"><a href="#" class="treding_btn">Trending</a>
                        <div class="fh5co_treding_position_absolute"></div>
                    </div>
                    <a href="#" class="color_fff fh5co_mediya_setting">Instagram’s big redesign goes live with black-and-white app</a>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="container">
            <div class="row">

                <div class="col-12 col-md-9 align-self-center fh5co_mediya_right">

                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid bg-faded fh5co_padd_mediya padding_786">
        <div class="container padding_786">
            <nav class="navbar navbar-toggleable-md navbar-light ">
                <button class="navbar-toggler navbar-toggler-right mt-3" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="fa fa-bars"></span></button>
                <a class="navbar-brand" href="#"><img src="images/logo.png" alt="img" class="mobile_logo_width" /></a>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <?php

                        use common\models\News;

                        $category = \common\models\Category::find()->all();
                        foreach ($category as $item) :
                        ?>
                            <li class="nav-item ">
                                <a class="nav-link" href="contact"><?= $item->name ?> <span class="sr-only">(current)</span></a>
                            </li>
                        <?php endforeach; ?>

                        <li class="nav-item ">
                            <a class="nav-link" href="contact">Contact <span class="sr-only">(current)</span></a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
    <?php foreach ($model as $news) : ?>
        <?php
        // Assuming $news is the ID of the news item, let's fetch the News model instance
        $newsModel = News::findOne($news);

        if ($newsModel === null) {
            // Handle the case where the news item with this ID does not exist
            continue; // Skip this iteration and continue with the next news item
        }

        $image = \common\components\StaticFunctions::getImage($newsModel, 'news', 'image');
        ?>
        <div class=""><img class="img-fluid" src="<?= $image ?>"></div>


        <span><?= Yii::$app->formatter->asDate($newsModel->created_at) ?></span>
        <h2><?= $newsModel->title ?></h2>
        </div>
        <div id="fh5co-single-content" class="container-fluid pb-4 pt-4 paddding">
            <div class="container paddding">
                <div class="row mx-0">
                    <div class="col-md-8 animate-box" data-animate-effect="fadeInLeft">
                        <p><?= $newsModel->content ?>

                        </p>

                    </div>

                    <div class="col-md-3 animate-box" data-animate-effect="fadeInRight">
                        <div>
                            <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">Tags</div>
                            <?= $newsModel->tag->name?>
                        </div>

                        <a href="#"><?php $newsModel->tag->name ?></a>

                    </div>


                <?php endforeach; ?>
                <div>
                    <div class="fh5co_heading fh5co_heading_border_bottom pt-3 py-2 mb-4">Most Popular</div>
                </div>
                <?php
                $lastnews = News::find()->limit(5)->all();

                // Use ->all() to execute the query and fetch the records
                foreach ($lastnews as $lastnew) :
                    $image = \common\components\StaticFunctions::getImage($lastnew, 'news', 'image');
                ?>
                    <div class="row pb-3">
                        <div class="col-3 align-self-center">
                            <!-- You can use the $lastnew model to display the actual data -->
                            <img src="<?= $image ?>" alt="img" class="" style="width: 100px" />
                        </div>
                        <div class="col-7 paddding">
                            <div class="most_fh5co_treding_font"> <?= $lastnew->title ?></div>
                            <div class="most_fh5co_treding_font_123"> <?= Yii::$app->formatter->asDate($lastnew->created_at) ?></div>
                        </div>
                    </div>
                <?php endforeach; ?>


                </div>
            </div>
        </div>
        </div>

        <div class="container-fluid fh5co_footer_bg pb-3">
            <div class="container animate-box">
                <div class="row">
                    <div class="col-12 spdp_right py-5"><img src="images/white_logo.png" alt="img" class="footer_logo" /></div>
                    <div class="clearfix"></div>
                    <div class="col-12 col-md-4 col-lg-3">
                        <div class="footer_main_title py-3"> Biz haqimizda</div>
                        <div class="footer_sub_about pb-3"> Bizda eng tezkor habarlarni o'qishingiz mumkin
                        </div>
                        <div class="footer_mediya_icon">
                            <div class="text-center d-inline-block"><a class="fh5co_display_table_footer">
                                    <div class="fh5co_verticle_middle"><i class="fa fa-linkedin"></i></div>
                                </a></div>
                            <div class="text-center d-inline-block"><a class="fh5co_display_table_footer">
                                    <div class="fh5co_verticle_middle"><i class="fa fa-google-plus"></i></div>
                                </a></div>
                            <div class="text-center d-inline-block"><a class="fh5co_display_table_footer">
                                    <div class="fh5co_verticle_middle"><i class="fa fa-twitter"></i></div>
                                </a></div>
                            <div class="text-center d-inline-block"><a class="fh5co_display_table_footer">
                                    <div class="fh5co_verticle_middle"><i class="fa fa-facebook"></i></div>
                                </a></div>
                        </div>
                    </div>
                    <div class="col-12 col-md-3 col-lg-2">
                        <div class="footer_main_title py-3"> Category</div>
                        <ul class="footer_menu">
                            <?php $category = \common\models\Category::find()->all();
                            foreach ($category as $item):
                            ?>
                            <li><a href="#" class=""><i class="fa fa-angle-right"></i>&nbsp;&nbsp; <?= $item->name?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>

                    <div class="col-12 col-md-12 col-lg-4 ">
                        <div class="footer_main_title py-3"> Last Modified Posts</div>
                        <?php
                        $lastnews = News::find()->limit(9)->all();

                        // Use ->all() to execute the query and fetch the records
                        foreach ($lastnews as $lastnew) :
                        $image = \common\components\StaticFunctions::getImage($lastnew, 'news', 'image');
                        ?>

                        <a href="#" class="footer_img_post_6"><img src="<?=$image?>" alt="img" /></a>
                        <?php endforeach;?>
                    </div>
                </div>
                <div class="row justify-content-center pt-2 pb-4">
                    <div class="col-12 col-md-8 col-lg-7 ">

                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid fh5co_footer_right_reserved">
            <div class="container">
                <div class="row  ">
                    <div class="col-12 col-md-6 py-4 Reserved"> © Copyright 2018, All rights reserved. Design by <a href="https://freehtml5.co" title="Free HTML5 Bootstrap templates">FreeHTML5.co</a>. </div>
                    <div class="col-12 col-md-6 spdp_right py-4">
                        <a href="index" class="footer_last_part_menu">Home</a>
                        <a href="contact" class="footer_last_part_menu">Contact</a>
                        <a href="index" class="footer_last_part_menu">Latest News</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="gototop js-top">
            <a href="#" class="js-gotop"><i class="fa fa-arrow-up"></i></a>
        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="js/owl.carousel.min.js"></script>
        <!--<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
        <!-- Waypoints -->
        <script src="js/jquery.waypoints.min.js"></script>
        <!-- Parallax -->
        <script src="js/jquery.stellar.min.js"></script>
        <!-- Main -->
        <script src="js/main.js"></script>
        <script>
            if (!navigator.userAgent.match(/Android|BlackBerry|iPhone|iPad|iPod|Opera Mini|IEMobile/i)) {
                $(window).stellar();
            }
        </script>

</body>

</html>