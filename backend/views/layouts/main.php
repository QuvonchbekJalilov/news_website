<?php

/** @var \yii\web\View $this */
/** @var string $content */

use backend\assets\AppAsset;
use common\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!doctype html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>My edu</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <link rel="shortcut icon" type="image/x-icon" href="/img/favicon.png">
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body >
<?php $this->beginBody() ?>
<!-- Preloader Start Here -->
<div id="preloader"></div>
<div id="wrapper" class="wrapper bg-ash">
<!--    Header widgets -->
    <?=\backend\widgets\Header::widget() ?>

    <div class="dashboard-page-one">
        <!-- Sidebar Area Start Here -->
        <?=\backend\widgets\Sidebar::widget()?>
        <!-- Sidebar Area End Here -->
        <div class="dashboard-content-one">
            <div class="breadcrumbs-area">
                <ul>
                    <?= Breadcrumbs::widget([
                        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                    ]) ?>
                </ul>
            </div>
            <?=$content?>
<!--            Footer -->
<!--            --><?//=\backend\widgets\Footer::widget()?>
        </div>
    </div>

</div>



<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage();
