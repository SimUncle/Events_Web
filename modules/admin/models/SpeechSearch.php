<?php

namespace app\modules\admin\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Speech;

/**
 * SpeechSearch represents the model behind the search form of `app\models\Speech`.
 */
class SpeechSearch extends Speech
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'speaker_id', 'sector_id', 'status', 'created_at', 'updated_at'], 'integer'],
            [['name'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * @param $params
     * @param $event_id
     * @return ActiveDataProvider
     */
    public function search($params, $sector_id)
    {
        $query = Speech::find();
        $query->where(['!=', 'status', -1]);
        $query->andWhere(['sector_id' => $sector_id]);

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
            'speaker_id' => $this->speaker_id,
            'sector_id' => $this->sector_id,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name]);

        return $dataProvider;
    }
}
