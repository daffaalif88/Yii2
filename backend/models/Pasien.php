<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "pasien".
 *
 * @property int $id
 * @property string $nik
 * @property string $nama_pasien
 * @property string $tanggal_lahir
 * @property string $jenis_kelamin
 *
 * @property Transaksi[] $transaksis
 */
class Pasien extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pasien';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nik', 'nama_pasien', 'tanggal_lahir', 'jenis_kelamin'], 'required'],
            [['tanggal_lahir'], 'safe'],
            [['nik', 'nama_pasien'], 'string', 'max' => 255],
            [['jenis_kelamin'], 'string', 'max' => 1],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nik' => 'Nik',
            'nama_pasien' => 'Nama Pasien',
            'tanggal_lahir' => 'Tanggal Lahir',
            'jenis_kelamin' => 'Jenis Kelamin',
        ];
    }

    /**
     * Gets query for [[Transaksis]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTransaksis()
    {
        return $this->hasMany(Transaksi::class, ['id_pasien' => 'id']);
    }
}
