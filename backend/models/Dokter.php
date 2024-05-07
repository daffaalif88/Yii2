<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "dokter".
 *
 * @property int $id
 * @property string $nik
 * @property string $nama_dokter
 * @property string $tanggal_lahir
 * @property string $jenis_kelamin
 *
 * @property Transaksi[] $transaksis
 */
class Dokter extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'dokter';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nik', 'nama_dokter', 'tanggal_lahir', 'jenis_kelamin'], 'required'],
            [['tanggal_lahir'], 'safe'],
            [['nik', 'nama_dokter'], 'string', 'max' => 255],
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
            'nama_dokter' => 'Nama Dokter',
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
        return $this->hasMany(Transaksi::class, ['id_dokter' => 'id']);
    }
}
