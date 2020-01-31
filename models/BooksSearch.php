<?php

namespace app\models;

use Yii;
use yii\data\ActiveDataProvider;

class BooksSearch extends Books
{
    public $min_cost;
    public $max_cost;
    public $name;

    public function rules()
    {
        return [
            [['id', 'cost', 'min_cost', 'max_cost', 'publishing_id'], 'integer'],
            [['title'], 'safe']
        ];
    }

    public function search($params)
    {

        $categoryId = Yii::$app->request->get('id');
        if (!$categoryId) {
            $query = Books::find()->with('publishing');
        } else {
            $query = Books::find()->with('publishing')
//                ->where(['category_id' => $categoryId])
            ;
        }

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 2
            ]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query
            ->andFilterWhere([
//                'like', 'category_id', $this->category_id
            ])
            ->andFilterWhere([
                'like', 'publishing', $this->publishing_id,
            ])
            ->andFilterWhere(['and',
                ['>=', 'cost', $this->min_cost],
                ['<=', 'cost', $this->max_cost]
            ])
            ->andFilterWhere([
//                'like', 'lower(authors)', strtolower($this->author_id)
            ]);

        return $dataProvider;
    }

    public function getBooksAuthors()
    {
        return $this->hasMany(BooksAuthors::className(), ['book_id' => 'id']);
    }

    public function getAuthor()
    {
        return $this->hasMany(Authors::className(), ['id' => 'author_id'])->via('booksAuthors');
    }
}
