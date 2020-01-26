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

$cost = [];

foreach ($allBooks as $book) {
    $cost[] = $book->cost;
}
$minCost = min($cost);
$maxCost = max($cost);

$this->title = 'Books list';
$this->params['breadcrumbs'][] = $this->title;
?>

<h2>Books list</h2>

<div class="site-about">
    <div class="col-xs-3" style="padding-left: 0">
        <ul class="nav nav-pills nav-stacked bg-info">
            <?php foreach ($categories as $category): ?>
                <li role="presentation">
                    <?= Html::a($category->category, ['', 'id' => $category->id]) ?>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>

    <div class="col-xs-9" style="padding-left: 0; padding-right: 0">
        <div class="filters col-xs-12" style="margin-bottom: 20px; padding-left: 0; padding-right: 0;">
            <?php $form = ActiveForm::begin() ?>
            <div class="col-xs-4" style="padding-left: 0; padding-right: 0">
                <p style="font-weight: bold">Price</p>
                <div class="col-xs-6" style="padding-left: 0">
                    <label>
                        <input type="text" class="form-control" placeholder="Min" value="<?php echo $minCost ?>">
                    </label>
                </div>
                <div class="col-xs-6" style="padding-left: 0">
                    <label>
                        <input type="text" class="form-control" placeholder="Max" value="<?php echo $maxCost ?>">
                    </label>
                </div>
            </div>
            <div class="col-xs-4" style="padding-left: 0">
                <p style="font-weight: bold">Publishing</p>
                <label>
                    <input type="text" class="form-control" placeholder="Publishing">
                </label>
            </div>
            <div class="col-xs-4" style="padding-right: 0; padding-left: 0;">
                <p style="font-weight: bold">Authors</p>
                <label>
                    <input type="text" class="form-control" placeholder="Authors">
                </label>
            </div>
            <?php ActiveForm::end(); ?>
        </div>

        <?php if (count($books) < 1): ?>
            <div class="item col-xs-12">
                Sorry! Category is empty...
            </div>
        <?php endif; ?>
        <?php foreach ($books as $book): ?>
            <div class="item col-xs-12"
                 style="margin-bottom: 20px; display: block; border: 1px solid #28a745!important; background-color: #f5f5f5;">
                <div class="photo col-xs-4" style="padding-left: 0; padding-top: 20px">
                    <img class="img-responsive" src="<?= $book->photo_url ?>" alt="book">
                </div>
                <div class="description col-xs-8" style="padding-right: 0">
                    <h3>
                        <?= Html::a($book->title, ['books/view', 'id' => $book->id]) ?>
                    </h3>
                    <h4>
                        <?= $book->authors ?>
                    </h4>
                    <ul>
                        <li>
                            <?php foreach ($publishing as $pub): ?>
                                <?php if ($pub->id === $book->publishing_id) echo $pub->name; ?>
                            <?php endforeach; ?>
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
        <?php endforeach; ?>

        <?php
        echo LinkPager::widget([
            'pagination' => $pages,
        ]);
        ?>
    </div>
</div>
