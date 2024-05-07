<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "transaksi_tindakan".
 *
 * @property int $id
 * @property int $id_transaksi
 * @property int $id_tindakan
 * @property int $jumlah
 *
 * @property Tindakan $tindakan
 * @property Transaksi $transaksi
 */
class TransaksiTindakan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'transaksi_tindakan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_transaksi', 'id_tindakan'], 'required'],
            [['id_transaksi', 'id_tindakan', 'jumlah'], 'integer'],
            [['id_tindakan'], 'exist', 'skipOnError' => true, 'targetClass' => Tindakan::class, 'targetAttribute' => ['id_tindakan' => 'id']],
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
            'id_tindakan' => 'Id Tindakan',
            'jumlah' => 'Jumlah',
        ];
    }

    /**
     * Gets query for [[Tindakan]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTindakan()
    {
        return $this->hasOne(Tindakan::class, ['id' => 'id_tindakan']);
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
