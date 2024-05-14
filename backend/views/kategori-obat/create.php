<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\KategoriObat $model */

$this->title = 'Tambah Kategori Obat';
$this->params['breadcrumbs'][] = ['label' => 'Kategori Obats', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kategori-obat-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
