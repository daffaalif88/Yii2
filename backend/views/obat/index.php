<?php

use backend\models\Obat;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\ObatSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Obat';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="obat-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Obat', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'nama_obat',
            [
                'attribute' => 'id_kategori',
                'value' => function ($model) {
                    return $model->kategori->id.', ('. $model->kategori->nama_kategori.')';
                }
            ],
            'harga_obat',
            'stok_obat',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Obat $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
