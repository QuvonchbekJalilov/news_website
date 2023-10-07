
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

