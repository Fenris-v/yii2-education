<?php

use app\models\Books;
use app\models\Categories;
use app\models\Publishing;
use yii\helpers\Html;
use yii\web\View;

/**
 * @var Books $book
 * @var Books[] $books
 * @var Books $model
 * @var Publishing[] $publishing
 * @var Categories[] $categories
 * @var View $this
 */

$this->title = $book->title;
$this->params['breadcrumbs'][] = [
    'template' => "<li>{link}</li>\n",
    'label' => 'Books list',
    'url' => ['/books']
];
$this->params['breadcrumbs'][] = $this->title;

?>

<h2><?= $book->title ?></h2>

<div class="item col-xs-12" style="margin-bottom: 20px; display: block;">
    <div class="photo col-xs-4" style="padding-left: 0">
        <img class="img-responsive" src="<?= $book->photo_url ?>" alt="book">
    </div>
    <div class="description col-xs-8" style="padding-right: 0">
        <?php foreach ($categories as $category): ?>
            <?php if ($category->id === $book->category_id): ?>
                <?= Html::a($category->category, ['/books', 'id' => $category->id], ['class' => 'label label-primary']) ?>
            <?php endif;
        endforeach; ?>
        <h4>
            <?= $book->author_id ?>
        </h4>
        <?= Html::a('Edit', ['books/update', 'id' => $book->id]) ?>
        <ul>
            <li>
                <?= $book->publishing->name ?>
            </li>
            <li>
                <?= $book->year . ' year' ?>
            </li>
            <li>
                <?= $book->cost . ' rub.' ?>
            </li>
        </ul>
        <p><?= $book->description ?></p>
    </div>
</div>
