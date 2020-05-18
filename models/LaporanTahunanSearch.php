<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\LaporanTahunan;

/**
 * LaporanTahunanSearch represents the model behind the search form of `app\models\LaporanTahunan`.
 */
class LaporanTahunanSearch extends LaporanTahunan
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'januari', 'februari', 'maret', 'april', 'mei', 'juni', 'juli', 'agustus', 'september', 'oktober', 'november', 'desember', 'total'], 'integer'],
            [['type', 'tahun'], 'safe'],
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
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = LaporanTahunan::find();

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
            'januari' => $this->januari,
            'februari' => $this->februari,
            'maret' => $this->maret,
            'april' => $this->april,
            'mei' => $this->mei,
            'juni' => $this->juni,
            'juli' => $this->juli,
            'agustus' => $this->agustus,
            'september' => $this->september,
            'oktober' => $this->oktober,
            'november' => $this->november,
            'desember' => $this->desember,
            'total' => $this->total,
        ]);

        $query->andFilterWhere(['like', 'type', $this->type])
            ->andFilterWhere(['like', 'tahun', $this->tahun]);

        return $dataProvider;
    }
}
