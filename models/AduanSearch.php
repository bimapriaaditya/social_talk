<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Aduan;

/**
 * AduanSearch represents the model behind the search form of `app\models\Aduan`.
 */
class AduanSearch extends Aduan
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_user', 'id_kategori', 'id_provinsi', 'id_kota', 'sifat'], 'integer'],
            [['nama', 'tanggal', 'keterangan_tempat', 'deskripsi', 'img_bukti_1', 'img_bukti_2', 'img_bukti_3'], 'safe'],
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
        $query = Aduan::find();

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
            'tanggal' => $this->tanggal,
            'id_kategori' => $this->id_kategori,
            'id_provinsi' => $this->id_provinsi,
            'id_kota' => $this->id_kota,
            'sifat' => $this->sifat,
        ]);

        $query->andFilterWhere(['like', 'nama', $this->nama])
            ->andFilterWhere(['like', 'keterangan_tempat', $this->keterangan_tempat])
            ->andFilterWhere(['like', 'deskripsi', $this->deskripsi])
            ->andFilterWhere(['like', 'img_bukti_1', $this->img_bukti_1])
            ->andFilterWhere(['like', 'img_bukti_2', $this->img_bukti_2])
            ->andFilterWhere(['like', 'img_bukti_3', $this->img_bukti_3]);

        return $dataProvider;
    }
}
