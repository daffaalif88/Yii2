<?php

use backend\models\JadwalPraktik;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\Url;

?>
<?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'Hari',
            'jam_mulai',
            'jam_selesai',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, JadwalPraktik $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>