<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Giibarang;

/**
 * GiibarangSearch represents the model behind the search form of `app\models\Giibarang`.
 */
class GiibarangSearch extends Giibarang
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_jenis', 'id_supllier', 'stok'], 'integer'],
            [['kode_barang', 'nama_barang', 'satuan'], 'safe'],
            [['harga'], 'number'],
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
        $query = Giibarang::find();

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
            'id_jenis' => $this->id_jenis,
            'id_supllier' => $this->id_supllier,
            'harga' => $this->harga,
            'stok' => $this->stok,
        ]);

        $query->andFilterWhere(['like', 'kode_barang', $this->kode_barang])
            ->andFilterWhere(['like', 'nama_barang', $this->nama_barang])
            ->andFilterWhere(['like', 'satuan', $this->satuan]);

        return $dataProvider;
    }
}
