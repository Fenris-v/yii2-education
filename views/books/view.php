<?php

use app\models\Books;
use yii\helpers\Html;
use yii\web\View;

/**
 * @var Books $book
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
        <h3>
            <?= $book->title ?>
        </h3>
        <h4>
            <?= $book->authors ?>
        </h4>
        <?= Html::a('Edit', ['books/update', 'id' => $book->id]) ?>
        <ul>
            <li>
                <?= $book->publishing_id ?>
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
