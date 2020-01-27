<?php

namespace app\controllers;

use app\models\BooksSearch;
use Yii;
use yii\web\Controller;

class ItemController extends Controller
{
    public function actionIndex()
    {
        $searchModel = new BooksSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('item', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider
        ]);
    }

    public function actionCreate()
    {
        $ad = new BooksSearch();

        if ($ad->load(Yii::$app->request->post()) && $ad->validate()) {
            $ad->save();

            return $this->redirect(['item/index']);
        }

        return $this->render('item', ['ad' => $ad]);
    }
}
