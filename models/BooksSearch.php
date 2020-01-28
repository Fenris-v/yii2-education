<?php

namespace app\models;

use Yii;
use yii\data\ActiveDataProvider;

class BooksSearch extends Books
{
    public $min_cost;
    public $max_cost;

    public function rules()
    {
        return [
            [['id', 'cost', 'min_cost', 'max_cost', 'category_id'], 'integer'],
            [['title', 'authors'], 'safe']
        ];
    }

    public function search($params)
    {

        $categoryId = Yii::$app->request->get('id');
        if (!$categoryId) {
            $query = Books::find();
        } else {
            $query = Books::find()->where(['category_id' => $categoryId]);
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
                'like', 'category_id', $this->category_id
            ])
            ->andFilterWhere([
                'publishing' => $this->publishing_id,
            ])
            ->andFilterWhere(['and',
                ['>=', 'cost', $this->min_cost],
                ['<=', 'cost', $this->max_cost]
            ])
            ->andFilterWhere([
                'like', 'lower(authors)', strtolower($this->authors)
            ]);

        return $dataProvider;
    }
}
