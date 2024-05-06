<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\Percoban $model */

$this->title = 'Create Percoban';
$this->params['breadcrumbs'][] = ['label' => 'Percobans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="percoban-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
