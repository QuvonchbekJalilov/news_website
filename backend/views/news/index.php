<?php

use common\models\News;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;

/** @var yii\web\View $this */
/** @var common\models\NewsSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'News';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="news-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create News', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',
            'content:ntext',
            //'created_at',
            //'updated_at',
            [
                'attribute' => 'category',
                'value' => 'category.name'
            ],
            [
                'attribute' => 'tag',
                'value' => 'tag.name'
            ],
            [
                'attribute' => 'image',
                'value' => function($model){
                    $image = \common\components\StaticFunctions::getImage($model , 'news' , 'image');
                    return "<img src='$image' style='width:100px;height: 80px;object-fit:cover'>";
                },
                'format' => 'HTML',
            ],
            [
                'buttons' => [

                    //view button
                    'update' => function ($url, $model) {
                        return Html::a('<span class="fa fa-pencil-alt p-2"></span>', $url, [
                            'class' => 'btn btn-primary btn-xs',
                            'title' => Yii::t('app', "Tahrirlash"),
                        ]);
                    },
                    'delete' => function ($url) {
                        return Html::a('<span class="fa fa-trash p-2"></span>', $url, [
                            'title' => Yii::t('app', "O'chirish"),
                            'data-confirm' => Yii::t('yii', 'Rostdan ham o\'chirilsinmi'),
                            'data-method' => 'post', 'data-pjax' => '0',
                            'class' => 'btn btn-danger btn-xs'
                        ]);
                    },
                    'view' => function ($url, $model) {
                        return Html::a('<span class="fa fa-eye p-2"></span>', $url, [
                            'class' => 'btn btn-info btn-xs',
                            'title' => Yii::t('app', "Ko'rish"),
                        ]);
                    }
                ],
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, News $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                }
            ],
        ],
    ]); ?>


</div>