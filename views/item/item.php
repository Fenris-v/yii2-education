<?php

use app\models\Books;
use app\models\BooksSearch;
use app\models\Categories;
use app\models\Publishing;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\ActiveForm;
use yii\widgets\LinkPager;
use yii\widgets\ListView;
use yii\widgets\Pjax;

/**
 * @var Books[] $books
 * @var Books[] $allBooks
 * @var BooksSearch[] $searchModel
 * @var BooksSearch[] $dataProvider
 * @var Categories[] $categories
 * @var Publishing[] $publishing
 * @var Books $pages
 * @var View $this
 */

$this->title = 'Books list';
$this->params['breadcrumbs'][] = $this->title;
?>

<h2>Books list</h2>

<div class="filters col-xs-12" style="margin-bottom: 20px; padding-left: 0; padding-right: 0;">
       <?php echo $this->render('_search', ['model' => $searchModel]); ?>
</div>

<div  class="filters col-xs-12" style="margin-bottom: 20px; padding-left: 0; padding-right: 0;">
    <?php Pjax::begin(); ?>
    <?= ListView::widget([
        'dataProvider' => $dataProvider,
//        'searchModel' => $searchModel,
//        'itemOption' => ['class' => 'item'],
        'itemView' => function ($model, $key, $index, $widget) {
            return Html::a(Html::encode($model->authors), ['view', 'id' => $model->id]);
        },
    ]); ?>
    <?php Pjax::end(); ?>
</div>
