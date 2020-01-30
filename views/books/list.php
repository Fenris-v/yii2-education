<?php

use app\models\Books;
use app\models\Categories;
use app\models\Publishing;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\ListView;
use yii\widgets\Pjax;

/**
 * @var Books[] $booksSearch
 * @var Books[] $dataProvider
 * @var Categories[] $categories
 */

if ($categoryId = Yii::$app->request->get('id')) {
    $this->title = $categories[$categoryId - 1]->category;
    $this->params['breadcrumbs'][] = [
        'template' => "<li>{link}</li>\n",
        'label' => 'All books',
        'url' => ['/books']
    ];
} else {
    $this->title = 'Books list';
}
$this->params['breadcrumbs'][] = $this->title;
?>

<h2><?= $this->title ?></h2>

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
            <?php echo $this->render('_search', ['model' => $booksSearch]); ?>
        </div>


        <?php Pjax::begin(); ?>
        <?= ListView::widget([
            'dataProvider' => $dataProvider,
            'emptyText' => 'Sorry! <br />Category is empty...',
            'itemView' =>
                function ($model) { ?>

                    <div class="item col-xs-12"
                         style="margin-bottom: 20px; display: block; border: 1px solid #28a745!important; background-color: #f5f5f5;">
                        <div class="photo col-xs-4" style="padding-left: 0; padding-top: 20px">
                            <img class="img-responsive" src="<?= $model->photo_url ?>" alt="book">
                        </div>
                        <div class="description col-xs-8" style="padding-right: 0">
                            <h3>
                                <?= Html::a($model->title, ['books/view', 'id' => $model->id]) ?>
                            </h3>
                            <h4>
                                <?php foreach ($model->author as $item): ?>
                                    <?= $item->name; ?>
                                <?php endforeach; ?>
                            </h4>
                            <ul>
                                <li>
                                    <?= $model->publishing->name ?>
                                </li>
                                <li>
                                    <?= $model->year . ' year' ?>
                                </li>
                                <li>
                                    <?= $model->cost . ' rub.' ?>
                                </li>
                            </ul>
                            <p><?= $model->description ?></p>
                        </div>
                    </div>
                <?php }]); ?>
        <?php Pjax::end(); ?>
    </div>
</div>
