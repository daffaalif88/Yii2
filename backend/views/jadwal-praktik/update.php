<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\JadwalPraktik $model */

$this->title = 'Update Jadwal Praktik: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Jadwal Praktiks', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="jadwal-praktik-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
