<?php

use app\models\Books;
use app\models\Categories;
use app\models\Publishing;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\ActiveForm;
use yii\widgets\LinkPager;

/**
 * @var Books[] $books
 * @var Books[] $allBooks
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

    <!--    --><?//= $form->field($model, 'publishing_id') ?>
    <?= $form->field($model, 'min_cost') ?>
    <?= $form->field($model, 'max_cost') ?>
    <?= $form->field($model, 'authors') ?>

    <div class="form-group">
        <?= Html::submitButton('Search') ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
