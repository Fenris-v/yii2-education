<?php

namespace app\controllers;

use app\models\Books;
use app\models\Categories;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class BooksController extends Controller
{
    public function actionIndex()
    {
        $books = Books::find()->all();
        $categories = Categories::find()->all();

        return $this->render('list', ['books' => $books, 'categories' => $categories]);
    }

    /**
     * @param $id
     *
     * @return string
     * @throws NotFoundHttpException
     */
    public function actionView($id)
    {
        $book = Books::findOne($id);

        if ($book === null) {
            throw new NotFoundHttpException('This book does not exists');
        }

        return $this->render('view', ['book' => $book]);
    }

    public function actionCreate()
    {
        $book = new Books();

        if ($book->load(Yii::$app->request->post()) && $book->validate()) {
            $book->save();

            return $this->redirect(['books/index']);
        }

        return $this->render('create', ['book' => $book]);
    }

    public function actionUpdate($id)
    {
        $book = Books::findOne($id);
        if ($book === null) {
            throw new NotFoundHttpException('This Book does not exists');
        }

        if ($book->load(Yii::$app->request->post()) && $book->validate()) {
            $book->save();

            return $this->redirect(['books/index']);
        }

        return $this->render('create', ['book' => $book]);
    }
}
