<?php

use app\models\Books;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\ActiveForm;

/**
 * @var Books $book
 * @var View $this
 */

$this->title = 'Add book';
$this->params['breadcrumbs'][] = $this->title;
?>

<h2>Add book</h2>

<?php $form = ActiveForm::begin() ?>
<?= $form->field($book, 'title')->label('Название') ?>
<?= $form->field($book, 'authors')->label('Авторы') ?>
<?= $form->field($book, 'category_id')->label('Категория') ?>
<?= $form->field($book, 'year')->label('Год')->input('number') ?>
<?= $form->field($book, 'publishing_id')->label('Издательство') ?>
<?= $form->field($book, 'photo_url')->label('Ссылка на изображение') ?>
<?= $form->field($book, 'cost')->label('Цена')->input('number') ?>
<?= $form->field($book, 'description')->label('Описание')->textarea(['rows' => '6']) ?>
<?= Html::submitButton('Create')?>
<?php ActiveForm::end(); ?>
