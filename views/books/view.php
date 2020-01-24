<?php

use app\models\Books;
use yii\web\View;
use yii\widgets\Breadcrumbs;

/**
 * @var Books $book
 * @var View $this
 */

$this->title = $book->title . ' by ' . $book->publishing_id . ' ' . $book->year;
$this->params['breadcrumbs'][] = $this->title;
?>
<h2><?= $book->title ?></h2>

<div>
    <div>
        <b><?= $book->title ?> <?= $book->publishing_id ?></b>
    </div>
    <div><?= $book->description ?></div>
</div>
