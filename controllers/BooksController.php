<?php

namespace app\controllers;

use app\models\Books;
use app\models\Categories;
use app\models\Publishing;
use Yii;
use yii\data\Pagination;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class BooksController extends Controller
{
    public function actionIndex()
    {
        $allBooks = Books::find()->all();
        $categoryId = Yii::$app->request->get('id');
        if (!$categoryId) {
            $query = Books::find();
        } else {
            $query = Books::find()->where(['category_id' => $categoryId]);
        }
        $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => 2]);
        $books = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->all();

        $categories = Categories::find()->all();
        $publishing = Publishing::find()->all();

        return $this->render('list', ['allBooks' => $allBooks, 'books' => $books, 'pages' => $pages, 'categories' => $categories, 'publishing' => $publishing]);
    }

//    public function getCategoryBooks()
//    {
//        $query
//    }

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

        if ($book === null) {
            throw new NotFoundHttpException('This book does not exists');
        }

        return $this->render('view', ['book' => $book, 'publishing' => $publishing]);
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
