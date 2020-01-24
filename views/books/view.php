<?php

use app\models\Books;
use yii\web\View;

/**
 * @var Books $book
 * @var View $this
 */

$this->title = $book->title . ' by ' . $book->publishing_id . ' ' . $book->year;
?>
<h2><?= $book->title ?></h2>

<div>
    <div>
        <b><?= $book->title ?> <?= $book->publishing_id ?></b>
    </div>
    <div><?= $book->description ?></div>
</div>
