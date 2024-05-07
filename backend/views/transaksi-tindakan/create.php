<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\TransaksiTindakan $model */

$this->title = 'Create Transaksi Tindakan';
$this->params['breadcrumbs'][] = ['label' => 'Transaksi Tindakans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="transaksi-tindakan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
