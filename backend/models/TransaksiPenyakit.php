<?php

namespace app\models;

use backend\models\Penyakit;
use backend\models\Transaksi;
use Yii;

/**
 * This is the model class for table "transaksi_penyakit".
 *
 * @property int $id
 * @property int $id_transaksi
 * @property int $id_penyakit
 *
 * @property Penyakit $penyakit
 * @property Transaksi $transaksi
 */
class TransaksiPenyakit extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'transaksi_penyakit';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_transaksi', 'id_penyakit'], 'required'],
            [['id_transaksi', 'id_penyakit'], 'integer'],
            [['id_penyakit'], 'exist', 'skipOnError' => true, 'targetClass' => Penyakit::class, 'targetAttribute' => ['id_penyakit' => 'id']],
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
            'id_penyakit' => 'Id Penyakit',
        ];
    }

    /**
     * Gets query for [[Penyakit]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPenyakit()
    {
        return $this->hasOne(Penyakit::class, ['id' => 'id_penyakit']);
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
