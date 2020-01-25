<?php

namespace app\controllers;

use app\models\Categories;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class CategoriesController extends Controller
{
    public function actionIndex()
    {
        $categories = Categories::find()->all();

        return $this->render('list', ['categories' => $categories]);
    }

    /**
     * @param $id
     *
     * @return string
     * @throws NotFoundHttpException
     */
    public function actionView($id)
    {
        $category = Categories::findOne($id);

        if ($category === null)
        {
            throw new NotFoundHttpException('This book does not exists');
        }

        return $this->render('view', ['category' => $category]);
    }

    public function actionCreate()
    {
        $category = new Categories();

        if ($category->load(Yii::$app->request->post()) && $category->validate()) {
            $category->save();

            return $this->redirect(['books/index']);
        }

        return $this->render('create', ['category' => $category]);
    }

    public function actionUpdate($id)
    {
        $category = Categories::findOne($id);
        if ($category === null) {
            throw new NotFoundHttpException('This Book does not exists');
        }

        if ($category->load(Yii::$app->request->post()) && $category->validate()) {
            $category->save();

            return $this->redirect(['books/index']);
        }

        return $this->render('create', ['category' => $category]);
    }
}
