<?php

use app\models\TransaksiPenyakit;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\TransaksiPenyakitSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Transaksi Penyakits';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="transaksi-penyakit-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Transaksi Penyakit', ['create'], ['class' => 'btn btn-success']) ?>
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
                    return $model->transaksi->id.', ('. $model->transaksi->pasien->nama_pasien.')';
                }
            ],
            [
                'attribute' => 'id_penyakit',
                'value' => function ($model) {
                    return $model->penyakit->id.', ('. $model->penyakit->nama_penyakit.')';
                }
            ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, TransaksiPenyakit $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
