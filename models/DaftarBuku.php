<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "daftar_buku".
 *
 * @property int $buku_id
 * @property int $kategori_id
 * @property string $judul
 * @property string $pengarang
 * @property string $tahun_terbit
 *
 * @property DaftarKategoriBuku $kategori
 */
class DaftarBuku extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'daftar_buku';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['kategori_id', 'judul', 'pengarang', 'tahun_terbit'], 'required'],
            [['kategori_id'], 'integer'],
            [['tahun_terbit'], 'safe'],
            [['judul', 'pengarang'], 'string', 'max' => 100],
            [['kategori_id'], 'exist', 'skipOnError' => true, 'targetClass' => DaftarKategoriBuku::className(), 'targetAttribute' => ['kategori_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'buku_id' => 'Buku ID',
            'kategori_id' => 'Kategori ID',
            'judul' => 'Judul',
            'pengarang' => 'Pengarang',
            'tahun_terbit' => 'Tahun Terbit',
        ];
    }

    /**
     * Gets query for [[Kategori]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getKategori()
    {
        return $this->hasOne(DaftarKategoriBuku::className(), ['id' => 'kategori_id']);
    }
}
