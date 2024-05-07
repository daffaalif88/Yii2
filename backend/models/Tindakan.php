<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tindakan".
 *
 * @property int $id
 * @property string $nama_tindakan
 * @property string $keterangan
 * @property int $tarif
 *
 * @property TransaksiTindakan[] $transaksiTindakans
 */
class Tindakan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tindakan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama_tindakan', 'keterangan', 'tarif'], 'required'],
            [['tarif'], 'integer'],
            [['nama_tindakan', 'keterangan'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama_tindakan' => 'Nama Tindakan',
            'keterangan' => 'Keterangan',
            'tarif' => 'Tarif',
        ];
    }

    /**
     * Gets query for [[TransaksiTindakans]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTransaksiTindakans()
    {
        return $this->hasMany(TransaksiTindakan::class, ['id_tindakan' => 'id']);
    }
}
