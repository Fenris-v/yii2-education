<?php

use app\models\Authors;
use app\models\Books;
use app\models\Categories;
use app\models\Publishing;
use kartik\select2\Select2;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\ActiveForm;

/**
 * @var Books[] $books
 * @var Books[] $allBooks
 * @var Authors[] $authors
 * @var Categories[] $categories
 * @var Publishing[] $publishing
 * @var Books $pages
 * @var View $this
 */
?>

<div class="search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]) ?>

    <?php
//    $form->field($model, 'authors')->widget(Select2::classname(), [
//        'data' => $data,
//        'language' => 'en',
//        'options' => ['placeholder' => 'Select a state ...'],
//        'pluginOptions' => [
//            'allowClear' => true
//        ],
//    ]); ?>

    <div class="col-xs-12" style="padding: 0">
        <div class="col-xs-4" style="padding: 0">
            <div class="col-xs-6" style="padding-left: 0">
                <?= $form->field($model, 'min_cost') ?>
            </div>
            <div class="col-xs-6" style="padding-left: 0">
                <?= $form->field($model, 'max_cost') ?>
            </div>
        </div>
        <div class="col-xs-4" style="padding-left: 0">
            <?= $form->field($model, 'publishing_id')->label('Publishing House') ?>
        </div>
        <div class="col-xs-4" style="padding: 0">
            <?= $form->field($model, 'author_id')->label('Author') ?>
        </div>
    </div>
    <div class="form-group">
        <?= Html::submitButton('Search') ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
