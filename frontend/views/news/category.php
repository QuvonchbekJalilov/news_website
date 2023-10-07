
    <?php

    /** @var yii\web\View $this */

    use common\models\News;
    use frontend\assets\AppAsset;
    use yii\helpers\Url;
    use yii\bootstrap5\LinkPager;
    $category = \common\models\Category::find()->all();

    AppAsset::register($this);
    $this->title = 'Yangliklar sayti';
    ?>
    <h1>Yangiliklar saytiga Hush kelibsiz!</h1>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <?php foreach ($category as $categoryItem): ?>

                        <li class="nav-item">
                            <form method="post">
                                <a class="nav-link" href="<?=Url::to(['/news/category' , 'id' => $categoryItem->id])?>"><?= $categoryItem->name?></a>
                            </form>
                        </li>
                    <?php endforeach; ?>


                </ul>

            </div>
        </div>
    </nav>
    <div class="container-fluid pb-4 pt-4 paddding">
        <div class="container paddding">
            <div class="row mx-0">
                <div class="col-md-12    animate-box" data-animate-effect="fadeInLeft">
                    <div>
                        <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">News</div>
                    </div>
                    <?php foreach ($models as $news) : ?>
                        <?php
                        $image  = \common\components\StaticFunctions::getImage($news , 'news' , 'image');

                        ?>
                        <div class="row pb-4">

                            <div class="col-md-5">
                                <div class="fh5co_hover_news_img">
                                    <div class="fh5co_news_img"><img src="<?= $image ?>" alt="" /></div>
                                    <div></div>
                                </div>
                            </div>
                            <div class="col-md-7 animate-box">
                                <a href="<?= Yii::$app->urlManager->createUrl(['site/single', 'id' => $news->id]) ?>" class="fh5co_magna py-2"> <?= $news->title ?> </a> <a href="single.html" class="fh5co_mini_time py-3"> Thomson Smith -
                                    <?= Yii::$app->formatter->asDate($news->created_at) ?> </a>
                                <div class="fh5co_consectetur">
                                    <?= strlen($news->content) > 50 ? substr($news->content, 0, 50) . '...' : $news->content ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

            </div>
            <div class="row mx-0 animate-box" data-animate-effect="fadeInUp">
                <div class="col-12 text-center pb-4 pt-4">
                    <?= LinkPager::widget([
                        'pagination' => $pagination, // Assuming you have a $pagination variable set in your controller
                        'prevPageLabel' => '<i class="fa fa-long-arrow-left"></i>&nbsp;&nbsp; Previous',
                        'nextPageLabel' => 'Next <i class="fa fa-long-arrow-right"></i>&nbsp;&nbsp;',
                        'options' => ['class' => 'pagination'], // You can customize the pagination container CSS class
                    ]) ?>
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

