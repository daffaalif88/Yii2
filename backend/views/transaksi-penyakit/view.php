<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\TransaksiPenyakit $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Transaksi Penyakits', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="transaksi-penyakit-view">

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
                'attribute' => 'id_transaksi',
                'value' => function ($model) {
                    return $model->transaksi->id.', ('. $model->transaksi->pasien->nama_pasien.')';
                }
            ],
            [
                'attribute' => 'id_penyakit',
                'value' => function ($model) {
                    return $model->penyakit->id.', ('. $model->penyakit->nama_penyakit.')';
                }
            ],
        ],
    ]) ?>

</div>
