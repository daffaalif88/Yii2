<?php

use yii\helpers\Html;
use yii\web\View;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var backend\models\Tindakan $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Tindakans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="tindakan-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'nama_tindakan',
            'keterangan',
            'tarif',
        ],
    ]) ?>

<?php
if (Yii::$app->session->hasFlash('success')) {
    $this->registerJs("
        Swal.fire({
            title: 'Berhasil!',
            text: 'Data Tindakan berhasil disimpan.',
            icon: 'success',
            confirmButtonText: 'OK'
        });
    ", View::POS_END);
}
?>

</div>
