<?php
use yii\helpers\Html;
use yii\grid\GridView;
// use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Transaksi */

?>



<h1 style="text-align: center;">INVOICE</h1>
<hr>
<h2>Detail Transaksi</h2>
<div class="container">
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
                'attribute' => 'ID_Pasien - [Nama]',
                'value' => function ($model) {
                    return $model->pasien->id . '- [' . $model->pasien->nama_pasien . ']';
                }
            ],
            [
                'attribute' => 'id_dokter [Nama]',
                'value' => function ($model) {
                    return $model->dokter->id . '- [' . $model->dokter->nama_dokter . ']';
                }
            ],
            [
                'attribute' => 'id_jadwal_praktik [hari]',
                'value' => function ($model) {
                    return $model->jadwalPraktik->id . '- [' . $model->jadwalPraktik->Hari . ']';
                }
            ],
            'tanggal_transaksi',
            [
                'attribute' => 'total_harga',
                'value' => function ($model) {
                    return 'Rp. ' . number_format($model->getTotalHarga(), 0, '', ',');
                }
            ],
            'status',
        ],
    ]) ?>
</div>

<hr>
<h3>Daftar Obat:</h3>
<div class="container">
    <?= GridView::widget([
    'dataProvider' => new \yii\data\ArrayDataProvider(['allModels' => $transaksiObats]),
    'columns' => [
        // 'id',
        [
            'attribute' => 'Id Obat [nama]',
            'value' => function ($model) {
                return $model->obat->id . ' - [' . $model->obat->nama_obat . ']';
            }
        ],
        'jumlah',
        [
            'attribute' => 'Harga Satuan',
            'value' => function ($model) {
                return 'Rp. ' . number_format($model->obat->harga_obat, 0, '', ',');
            }
        ],
        [
            'attribute' => 'Total',
            'value' => function ($model) {
                return 'Rp. ' . number_format($model->obat->harga_obat * $model->jumlah, 0, '', ',');
            }
        ],
    ],
]) ?>
</div>

<hr>
<h2>Daftar tindakan</h2>
<div class="container">
    <?= GridView::widget([
    'dataProvider' => new \yii\data\ArrayDataProvider(['allModels' => $transaksiTindakan]),
    'columns' => [
        // 'id',
        [
            'attribute' => 'Id Tindakan [nama]',
            'value' => function ($model) {
                return $model->tindakan->id . ' - [' . $model->tindakan->nama_tindakan . ']';
            }
        ],
        [
            'attribute' => 'Harga Tindakan',
            'value' => function ($model) {
                return 'Rp. ' . number_format($model->tindakan->tarif, 0, '', ',');
            }
        ],
    ],
]) ?>
</div>
<hr>
<h2>Diagnosa Penyakit</h2>
<div class="container">
    <?= GridView::widget([
        'dataProvider' => new \yii\data\ArrayDataProvider(['allModels' => $transaksiPenyakit]),
        'columns' => [
            // 'id',
            [
                'attribute' => 'Id Penyakit [nama]',
                'value' => function ($model) {
                    return $model->penyakit->id . ' - [' . $model->penyakit->nama_penyakit . ']';
                }
            ],
        ],
    ]) ?>
</div>
<hr>