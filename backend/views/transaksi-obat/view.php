<?php

use yii\helpers\Html;
use yii\web\View;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var backend\models\TransaksiObat $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Transaksi Obat', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="transaksi-obat-view">

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
                'attribute' => 'id_obat',
                'value' => function ($model) {
                    return $model->obat->id.', ('. $model->obat->nama_obat.')';
                }
            ],
            'jumlah',
        ],
    ]) ?>

<?php
if (Yii::$app->session->hasFlash('success')) {
    $this->registerJs("
        Swal.fire({
            title: 'Berhasil!',
            text: 'Data Transaksi Obat berhasil disimpan.',
            icon: 'success',
            confirmButtonText: 'OK'
        });
    ", View::POS_END);
}
?>

</div>
