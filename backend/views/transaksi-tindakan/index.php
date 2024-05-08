<?php

use backend\models\TransaksiTindakan;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\TransaksiTindakanSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Tindakan Yang Dilakukan';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="transaksi-tindakan-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Transaksi Tindakan', ['create'], ['class' => 'btn btn-success']) ?>
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
                'attribute' => 'id_tindakan',
                'value' => function ($model) {
                    return $model->tindakan->id.', ('. $model->tindakan->nama_tindakan.')';
                }
            ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, TransaksiTindakan $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
