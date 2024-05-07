<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\Penyakit $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="penyakit-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nama_penyakit')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'deskripsi_penyakit')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
