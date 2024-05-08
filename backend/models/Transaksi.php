<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "transaksi".
 *
 * @property int $id
 * @property int $id_pasien
 * @property int $id_dokter
 * @property int $id_jadwal_praktik
 * @property string $tanggal_transaksi
 * @property int $total_harga
 * @property string $status
 *
 * @property Dokter $dokter
 * @property JadwalPraktik $jadwalPraktik
 * @property Pasien $pasien
 * @property TransaksiObat[] $transaksiObats
 * @property TransaksiPenyakit[] $transaksiPenyakits
 * @property TransaksiTindakan[] $transaksiTindakans
 */
class Transaksi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'transaksi';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_pasien', 'id_dokter', 'id_jadwal_praktik', 'tanggal_transaksi', 'total_harga', 'status'], 'required'],
            [['id_pasien', 'id_dokter', 'id_jadwal_praktik', 'total_harga'], 'integer'],
            [['tanggal_transaksi'], 'safe'],
            [['status'], 'string', 'max' => 255],
            [['id_dokter'], 'exist', 'skipOnError' => true, 'targetClass' => Dokter::class, 'targetAttribute' => ['id_dokter' => 'id']],
            [['id_jadwal_praktik'], 'exist', 'skipOnError' => true, 'targetClass' => JadwalPraktik::class, 'targetAttribute' => ['id_jadwal_praktik' => 'id']],
            [['id_pasien'], 'exist', 'skipOnError' => true, 'targetClass' => Pasien::class, 'targetAttribute' => ['id_pasien' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_pasien' => 'Id Pasien',
            'id_dokter' => 'Id Dokter',
            'id_jadwal_praktik' => 'Id Jadwal Praktik',
            'tanggal_transaksi' => 'Tanggal Transaksi',
            'total_harga' => 'Total Harga',
            'status' => 'Status',
        ];
    }

    public function getTotalHarga()
    {
        // Ambil semua item transaksi obat untuk transaksi ini
        $transaksiObat = $this->getTransaksiObats()->all();

        // Hitung total harga obat
        $totalHargaObat = 0;
        foreach ($transaksiObat as $item) {
            $totalHargaObat += $item->jumlah * $item->obat->harga_obat;
        }

        // Ambil semua item transaksi tindakan untuk transaksi ini
        $transaksiTindakan = $this->getTransaksiTindakans()->all();

        // Hitung total harga tindakan
        $totalHargaTindakan = 0;
        foreach ($transaksiTindakan as $item) {
            $totalHargaTindakan += $item->tindakan->tarif;
        }

        // Hitung total harga keseluruhan transaksi
        $totalHargaKeseluruhan = $totalHargaObat + $totalHargaTindakan;

        return $totalHargaKeseluruhan;
    }



    /**
     * Gets query for [[Dokter]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDokter()
    {
        return $this->hasOne(Dokter::class, ['id' => 'id_dokter']);
    }

    /**
     * Gets query for [[JadwalPraktik]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getJadwalPraktik()
    {
        return $this->hasOne(JadwalPraktik::class, ['id' => 'id_jadwal_praktik']);
    }

    /**
     * Gets query for [[Pasien]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPasien()
    {
        return $this->hasOne(Pasien::class, ['id' => 'id_pasien']);
    }

    /**
     * Gets query for [[TransaksiObats]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTransaksiObats()
    {
        return $this->hasMany(TransaksiObat::class, ['id_transaksi' => 'id']);
    }

    /**
     * Gets query for [[TransaksiPenyakits]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTransaksiPenyakits()
    {
        return $this->hasMany(TransaksiPenyakit::class, ['id_transaksi' => 'id']);
    }

    /**
     * Gets query for [[TransaksiTindakans]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTransaksiTindakans()
    {
        return $this->hasMany(TransaksiTindakan::class, ['id_transaksi' => 'id']);
    }
}
