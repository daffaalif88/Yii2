<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "jadwal_praktik".
 *
 * @property int $id
 * @property string $Hari
 * @property string $jam_mulai
 * @property string $jam_selesai
 *
 * @property Transaksi[] $transaksis
 */
class JadwalPraktik extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'jadwal_praktik';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Hari', 'jam_mulai', 'jam_selesai'], 'required'],
            [['jam_mulai', 'jam_selesai'], 'safe'],
            [['Hari'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'Hari' => 'Hari',
            'jam_mulai' => 'Jam Mulai',
            'jam_selesai' => 'Jam Selesai',
        ];
    }

    /**
     * Gets query for [[Transaksis]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTransaksis()
    {
        return $this->hasMany(Transaksi::class, ['id_jadwal_praktik' => 'id']);
    }
}
