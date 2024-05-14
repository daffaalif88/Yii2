<?php

use backend\models\TransaksiObat;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\TransaksiObatSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Pembelian Obat';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="transaksi-obat-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Transaksi Obat', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'attribute' => 'id_transaksi',
                'value' => function ($model) {
                    return $model->transaksi->id.' - ('. $model->transaksi->pasien->id.', '. $model->transaksi->pasien->nama_pasien.')';
                }
            ],
            [
                'attribute' => 'id_obat',
                'value' => function ($model) {
                    return $model->obat->id.'- ('. $model->obat->nama_obat.')';
                }
            ],
            'jumlah',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, TransaksiObat $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
