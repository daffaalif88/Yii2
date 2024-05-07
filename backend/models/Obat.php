<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "obat".
 *
 * @property int $id
 * @property string $nama_obat
 * @property int $id_kategori
 * @property int $harga_obat
 * @property int $stok_obat
 *
 * @property KategoriObat $kategori
 * @property TransaksiObat[] $transaksiObats
 */
class Obat extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'obat';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama_obat', 'id_kategori', 'harga_obat', 'stok_obat'], 'required'],
            [['id_kategori', 'harga_obat', 'stok_obat'], 'integer'],
            [['nama_obat'], 'string', 'max' => 255],
            [['id_kategori'], 'exist', 'skipOnError' => true, 'targetClass' => KategoriObat::class, 'targetAttribute' => ['id_kategori' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama_obat' => 'Nama Obat',
            'id_kategori' => 'Id Kategori',
            'harga_obat' => 'Harga Obat',
            'stok_obat' => 'Stok Obat',
        ];
    }

    /**
     * Gets query for [[Kategori]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getKategori()
    {
        return $this->hasOne(KategoriObat::class, ['id' => 'id_kategori']);
    }

    /**
     * Gets query for [[TransaksiObats]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTransaksiObats()
    {
        return $this->hasMany(TransaksiObat::class, ['id_obat' => 'id']);
    }
}
