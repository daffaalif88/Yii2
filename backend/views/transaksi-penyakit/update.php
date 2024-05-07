<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\TransaksiPenyakit $model */

$this->title = 'Update Transaksi Penyakit: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Transaksi Penyakits', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="transaksi-penyakit-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
