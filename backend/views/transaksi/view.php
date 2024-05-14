<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var backend\models\Transaksi $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Transaksis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="transaksi-view">

    <h1>Kode Transaksi: <?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
        <?php
        if ($model->status == 'lunas') {
            echo Html::a('Print', ['print', 'id' => $model->id], ['class' => 'btn btn-success', 'target' => '_blank']);

        } else {
            echo Html::a('Print', '#', ['class' => 'btn btn-success disabled', 'onclick' => 'return false;', 'title' => 'Pembayaran belum lunas']);
        }
        ?>

    

    </p>
    <br>
    <h1>Detail Transaksi</h1>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
                'attribute' => 'id_pasien',
                'value' => function ($model) {
                    return $model->pasien->id . '- (' . $model->pasien->nama_pasien . ')';
                }
            ],
            [
                'attribute' => 'id_dokter',
                'value' => function ($model) {
                    return $model->dokter->id . '- (' . $model->dokter->nama_dokter . ')';
                }
            ],
            [
                'attribute' => 'id_jadwal_praktik',
                'value' => function ($model) {
                    return $model->jadwalPraktik->id . '- (' . $model->jadwalPraktik->Hari . ')';
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
    <hr>
    <h3>Daftar Obat Yang Dibeli:</h3>
    <!-- <button class="btn btn-primary">Tambah Obat</button> -->
    <a href="../transaksi-obat/create" class="btn btn-primary">Tambah Obat</a>
    <?= GridView::widget([
        'dataProvider' => new \yii\data\ArrayDataProvider(['allModels' => $transaksiObats]),
        'columns' => [
            // 'id',
            [
                'attribute' => 'Id Obat',
                'value' => function ($model) {
                    return $model->obat->id . '- (' . $model->obat->nama_obat . ')';
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
    <hr>
    <h3>Daftar Tindakan Yang Dilakukan</h3>
    <a href="../transaksi-tindakan/create" class="btn btn-primary">Tambah Obat</a>
    <?= GridView::widget([
        'dataProvider' => new \yii\data\ArrayDataProvider(['allModels' => $transaksiTindakan]),
        'columns' => [
            // 'id',
            [
                'attribute' => 'Id Tindakan',
                'value' => function ($model) {
                    return $model->tindakan->id . '- (' . $model->tindakan->nama_tindakan . ')';
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
    <hr>
    <h3>Diagnosa Penyakit</h3>
    <a href="../transaksi-penyakit/create" class="btn btn-primary">Tambah Diagnosa</a>
    <?= GridView::widget([
        'dataProvider' => new \yii\data\ArrayDataProvider(['allModels' => $transaksiPenyakit]),
        'columns' => [
            // 'id',
            [
                'attribute' => 'Id Penyakit',
                'value' => function ($model) {
                    return $model->penyakit->id . '- (' . $model->penyakit->nama_penyakit . ')';
                }
            ],
        ],
    ]) ?>

</div>