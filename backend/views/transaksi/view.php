<?php

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

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
                'attribute' => 'id_pasien',
                'value' => function ($model) {
                    return $model->pasien->id.', ('. $model->pasien->nama_pasien.')';
                }
            ],
            [
                'attribute' => 'id_dokter',
                'value' => function ($model) {
                    return $model->dokter->id.', ('. $model->dokter->nama_dokter.')';
                }
            ],
            [
                'attribute' => 'id_jadwal_praktik',
                'value' => function ($model) {
                    return $model->jadwalPraktik->id.', ('. $model->jadwalPraktik->Hari.')';
                }
            ],
            'tanggal_transaksi',
            'total_harga',
            'status',
        ],
    ]) ?>

</div>
