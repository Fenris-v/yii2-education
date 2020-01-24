<?php

use app\models\Books;
use yii\helpers\Html;
use yii\web\View;

/**
 * @var Books[] $books
 * @var View $this
 */

$this->title = 'Books list';
?>
<h2>Books list</h2>

<?= Html::a('Add book', ['books/create']) ?>

<?php foreach ($books as $book): ?>
<div>
    <h3>
        <?= Html::a($book->title, ['books/view', 'id' => $book->id]) ?>
    </h3>
    <?= Html::a('Edit', ['books/update', 'id' => $book->id]) ?>
    <div>
        <b><?= $book->publishing_id ?> <?= $book->year ?></b>
    </div>
    <div><?= $book->description ?></div>
</div>
<?php endforeach; ?>
