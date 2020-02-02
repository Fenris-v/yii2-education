<?php

use app\models\Authors;
use app\models\Categories;
use app\models\Publishing;
use app\models\Books;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\ActiveForm;

/**
 * @var Books $book
 * @var Authors $authors
 * @var View $this
 */

if (Yii::$app->request->pathInfo === 'books/update') {
    $title = 'Edit book';
    $btn = 'Save';
} else {
    $title = 'Add book';
    $btn = 'Create';
}

$this->title = $title;
$this->params['breadcrumbs'][] = $this->title;
?>

<h2><?= $title ?></h2>

<?php $form = ActiveForm::begin() ?>
<?= $form->field($book, 'title')->label('Название') ?>

<?= $form->field($book, 'author')->label('Авторы')->widget(Select2::className(), [
    'data' => ArrayHelper::map(Authors::find()->all(), 'id', 'name'),
    'language' => 'en',
    'options' => ['placeholder' => 'Select authors'],
    'pluginOptions' => [
        'allowClear' => true,
        'multiple' => true
    ]
]); ?>
<?= $form->field($book, 'category')->label('Категории')->widget(Select2::className(), [
    'data' => ArrayHelper::map(Categories::find()->all(), 'id', 'category'),
    'language' => 'en',
    'options' => ['placeholder' => 'Select categories'],
    'pluginOptions' => [
        'allowClear' => true,
        'multiple' => true
    ]
]); ?>
<?= $form->field($book, 'year')->label('Год')->input('number') ?>
<?= $form->field($book, 'publishing_id')->label('Издательство') ?>
<?= $form->field($book, 'publishing')->label('Издательство')->widget(Select2::className(), [
    'data' => ArrayHelper::map(Publishing::find()->all(), 'id', 'name'),
    'language' => 'en',
    'options' => ['placeholder' => 'Select categories'],
    'pluginOptions' => [
        'allowClear' => true,
    ]
]); ?>
<?= $form->field($book, 'photo_url')->label('Ссылка на изображение') ?>
<?= $form->field($book, 'cost')->label('Цена')->input('number') ?>
<?= $form->field($book, 'description')->label('Описание')->textarea(['rows' => '6']) ?>
<?= Html::submitButton($btn)?>
<?php ActiveForm::end(); ?>
