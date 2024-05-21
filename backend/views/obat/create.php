<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\Obat $model */

$this->title = 'Tambah Obat';
$this->params['breadcrumbs'][] = ['label' => 'Obat', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="obat-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
