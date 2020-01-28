<?php

namespace app\controllers;

use app\models\Books;
use app\models\BooksSearch;
use app\models\Categories;
use app\models\Publishing;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class BooksController extends Controller
{
    public function actionIndex()
    {

        $categories = Categories::find()->all();
        $publishing = Publishing::find()->all();

        $booksSearch = new BooksSearch();
        $dataProvider = $booksSearch->search(Yii::$app->request->queryParams);

        return $this->render('list', [
            'categories' => $categories, 'publishing' => $publishing,
            'booksSearch' => $booksSearch, 'dataProvider' => $dataProvider
        ]);
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
        $publishing = Publishing::find()->all();
        $categories = Categories::find()->all();

        if ($book === null) {
            throw new NotFoundHttpException('This book does not exists');
        }

        return $this->render('view', [
            'book' => $book,
            'publishing' => $publishing,
            'categories' => $categories
        ]);
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
