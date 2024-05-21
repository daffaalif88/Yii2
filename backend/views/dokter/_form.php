<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\Dokter $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="dokter-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nik')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama_dokter')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tanggal_lahir')->widget(\yii\jui\DatePicker::classname(), [
        'options' => ['class' => 'form-control', 'readonly' => true],
        'dateFormat' => 'yyyy-MM-dd', // Atur format tanggal yang diinginkan sesuai kebutuhan Anda
        'clientOptions' => [
            'changeYear' => true, // Opsional: Izinkan perubahan tahun
            'changeMonth' => true, // Opsional: Izinkan perubahan bulan
            'yearRange' => '1900:' . date('Y'),
            // Tambahan opsi lainnya sesuai kebutuhan Anda
        ],
    ]) ?>

    <?= $form->field($model, 'jenis_kelamin')->radioList(['L' => 'Laki-laki', 'P' => 'Perempuan']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>