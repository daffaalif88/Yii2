<?php

use backend\models\Transaksi;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\TransaksiSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Transaksi';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="transaksi-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Tambah Transaksi', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'layout' => "{summary}\n{items}\n{pager}",
        'options' => ['class' => 'custom-grid-view'],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'attribute' => 'id_pasien',
                'value' => function ($model) {
                    return $model->pasien->id . ', (' . $model->pasien->nama_pasien . ')';
                }
            ],
            [
                'attribute' => 'id_dokter',
                'value' => function ($model) {
                    return $model->dokter->id . ', (' . $model->dokter->nama_dokter . ')';
                }
            ],
            [
                'attribute' => 'id_jadwal_praktik',
                'value' => function ($model) {
                    return $model->jadwalPraktik->id . ', (' . $model->jadwalPraktik->Hari . ')';
                }
            ],
            'tanggal_transaksi',
            [
                'attribute' => 'total_harga',
                'value' => function ($model) {
                    return 'Rp. '.number_format($model->getTotalHarga(), 0, '', ',');
                }
            ],

            'status',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Transaksi $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                }
            ],
        ],
    ]); ?>


</div>