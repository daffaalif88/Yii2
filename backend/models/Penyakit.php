<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "penyakit".
 *
 * @property int $id
 * @property string $nama_penyakit
 * @property string $deskripsi_penyakit
 *
 * @property TransaksiPenyakit[] $transaksiPenyakits
 */
class Penyakit extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'penyakit';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama_penyakit', 'deskripsi_penyakit'], 'required'],
            [['nama_penyakit', 'deskripsi_penyakit'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama_penyakit' => 'Nama Penyakit',
            'deskripsi_penyakit' => 'Deskripsi Penyakit',
        ];
    }

    /**
     * Gets query for [[TransaksiPenyakits]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTransaksiPenyakits()
    {
        return $this->hasMany(TransaksiPenyakit::class, ['id_penyakit' => 'id']);
    }
}
