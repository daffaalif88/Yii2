<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\JadwalPraktik $model */

$this->title = 'Tambah Jadwal Praktik';
$this->params['breadcrumbs'][] = ['label' => 'Jadwal Praktiks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jadwal-praktik-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
