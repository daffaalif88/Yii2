<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "kategori_obat".
 *
 * @property int $id
 * @property string $nama_kategori
 * @property string $deskripsi_kategori
 *
 * @property Obat[] $obats
 */
class KategoriObat extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'kategori_obat';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama_kategori', 'deskripsi_kategori'], 'required'],
            [['deskripsi_kategori'], 'string'],
            [['nama_kategori'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama_kategori' => 'Nama Kategori',
            'deskripsi_kategori' => 'Deskripsi Kategori',
        ];
    }

    /**
     * Gets query for [[Obats]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getObats()
    {
        return $this->hasMany(Obat::class, ['id_kategori' => 'id']);
    }
}
