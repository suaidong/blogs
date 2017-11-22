<?php

namespace common\models\admin;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\admin\Article;

/**
 * ArticleSearch represents the model behind the search form about `common\models\admin\Article`.
 */
class ArticleSearch extends Article
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'type_id', 'sort', 'state'], 'integer'],
            [['title', 'img', 'content', 'author', 'time'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Article::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'type_id' => $this->type_id,
            'sort' => $this->sort,
            'state' => $this->state,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'img', $this->img])
            ->andFilterWhere(['like', 'content', $this->content])
            ->andFilterWhere(['like', 'author', $this->author])
            ->andFilterWhere(['like', 'time', $this->time])
            ->orderBy("id DESC");
            
        return $dataProvider;
    }
}
