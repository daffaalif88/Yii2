<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\JadwalPraktik $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="jadwal-praktik-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Hari')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'jam_mulai')->textInput() ?>

    <?= $form->field($model, 'jam_selesai')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
