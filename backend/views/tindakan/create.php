<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\Tindakan $model */

$this->title = 'Tambah Tindakan';
$this->params['breadcrumbs'][] = ['label' => 'Tindakan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tindakan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
