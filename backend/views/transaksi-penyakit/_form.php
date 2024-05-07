<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\TransaksiPenyakit $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="transaksi-penyakit-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_transaksi')->textInput() ?>

    <?= $form->field($model, 'id_penyakit')->textInput() ?>

    <?= $form->field($model, 'jumlah')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
