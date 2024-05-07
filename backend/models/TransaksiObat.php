<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "transaksi_obat".
 *
 * @property int $id
 * @property int $id_transaksi
 * @property int $id_obat
 * @property int $jumlah
 *
 * @property Obat $obat
 * @property Transaksi $transaksi
 */
class TransaksiObat extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'transaksi_obat';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_transaksi', 'id_obat'], 'required'],
            [['id_transaksi', 'id_obat', 'jumlah'], 'integer'],
            [['id_obat'], 'exist', 'skipOnError' => true, 'targetClass' => Obat::class, 'targetAttribute' => ['id_obat' => 'id']],
            [['id_transaksi'], 'exist', 'skipOnError' => true, 'targetClass' => Transaksi::class, 'targetAttribute' => ['id_transaksi' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_transaksi' => 'Id Transaksi',
            'id_obat' => 'Id Obat',
            'jumlah' => 'Jumlah',
        ];
    }

    /**
     * Gets query for [[Obat]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getObat()
    {
        return $this->hasOne(Obat::class, ['id' => 'id_obat']);
    }

    /**
     * Gets query for [[Transaksi]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTransaksi()
    {
        return $this->hasOne(Transaksi::class, ['id' => 'id_transaksi']);
    }
}
