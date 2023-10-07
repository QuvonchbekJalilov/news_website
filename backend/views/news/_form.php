<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\News $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="news-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>

 

    <?= $form->field($model, 'category_id')->dropDownList(ArrayHelper::map(\common\models\Category::find()->all(),  'id','name')) ?>

    <?= $form->field($model, 'tag_id')->dropDownList(ArrayHelper::map(\common\models\Tag::find()->all(),  'id','name')) ?>

    <?= $form->field($model, 'image')->fileInput(['multiple' => true,'accept' => 'image/*'])?>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
