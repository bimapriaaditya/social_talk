<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Petugas;

/**
 * PetugasSearch represents the model behind the search form of `app\models\Petugas`.
 */
class PetugasSearch extends Petugas
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_user', 'id_bagian', 'id_provinsi', 'id_kota', 'usia'], 'integer'],
            [['nama', 'no_telepon', 'alamat', 'tanggal_lahir', 'img'], 'safe'],
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
        $query = Petugas::find();

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
            'id_user' => $this->id_user,
            'id_bagian' => $this->id_bagian,
            'id_provinsi' => $this->id_provinsi,
            'id_kota' => $this->id_kota,
            'tanggal_lahir' => $this->tanggal_lahir,
            'usia' => $this->usia,
        ]);

        $query->andFilterWhere(['like', 'nama', $this->nama])
            ->andFilterWhere(['like', 'no_telepon', $this->no_telepon])
            ->andFilterWhere(['like', 'alamat', $this->alamat])
            ->andFilterWhere(['like', 'img', $this->img]);

        return $dataProvider;
    }
}
