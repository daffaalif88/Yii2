<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\TransaksiTindakan $model */

$this->title = 'Update Tindakan Yang Dilakukan: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Transaksi Tindakans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="transaksi-tindakan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
