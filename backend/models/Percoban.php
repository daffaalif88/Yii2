<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "percoban".
 *
 * @property int $id
 * @property string $nama
 * @property string $belakang
 * @property string $keterangan
 */
class Percoban extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'percoban';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama', 'belakang', 'keterangan'], 'required'],
            [['keterangan'], 'string'],
            [['nama'], 'string', 'max' => 144],
            [['belakang'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama' => 'Nama',
            'belakang' => 'Belakang',
            'keterangan' => 'Keterangan',
        ];
    }
}
