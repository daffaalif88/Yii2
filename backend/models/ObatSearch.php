<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Obat;

/**
 * ObatSearch represents the model behind the search form of `backend\models\Obat`.
 */
class ObatSearch extends Obat
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_kategori', 'harga_obat', 'stok_obat'], 'integer'],
            [['nama_obat'], 'safe'],
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
        $query = Obat::find();

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
            'id_kategori' => $this->id_kategori,
            'harga_obat' => $this->harga_obat,
            'stok_obat' => $this->stok_obat,
        ]);

        $query->andFilterWhere(['like', 'nama_obat', $this->nama_obat]);

        return $dataProvider;
    }
}
