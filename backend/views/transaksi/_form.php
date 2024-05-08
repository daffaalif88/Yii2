<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
// use yii\jui\DatePickerAsset;

// Memuat asset DatePicker
// DatePickerAsset::register($this);

/** @var yii\web\View $this */
/** @var backend\models\Transaksi $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="transaksi-form">

    <?php $form = ActiveForm::begin(); ?>

    <!-- <?= $form->field($model, 'id_pasien')->textInput() ?>  -->
    <?= $form->field($model, 'id_pasien')->dropDownList(
        \yii\helpers\ArrayHelper::map(\backend\models\Pasien::find()->all(), 'id', 'nama_pasien'),
        ['prompt' => 'Pilih Pasien']
    ) ?>

    <!-- <?= $form->field($model, 'id_dokter')->textInput() ?> -->
    <?= $form->field($model, 'id_dokter')->dropDownList(
        \yii\helpers\ArrayHelper::map(\backend\models\Dokter::find()->all(), 'id', 'nama_dokter'),
        ['prompt' => 'Pilih Dokter']
    ) ?>

    <!-- <?= $form->field($model, 'id_jadwal_praktik')->textInput() ?> masih Bug-->
    <?= $form->field($model, 'id_jadwal_praktik')->dropDownList(
        \yii\helpers\ArrayHelper::map(\backend\models\JadwalPraktik::find()->all(), 'id', 'Hari'),
        ['prompt' => 'Pilih jadwal']
    ) ?>

    <!-- <?= $form->field($model, 'tanggal_transaksi')->textInput() ?> -->
    <?= $form->field($model, 'tanggal_transaksi')->widget(\yii\jui\DatePicker::classname(), [
        'options' => ['class' => 'form-control read-only'],
        'dateFormat' => 'yyyy-MM-dd', // Atur format tanggal yang diinginkan sesuai kebutuhan Anda
        'clientOptions' => [
            'changeYear' => true, // Opsional: Izinkan perubahan tahun
            'changeMonth' => true, // Opsional: Izinkan perubahan bulan
            // Tambahan opsi lainnya sesuai kebutuhan Anda
        ],
    ]) ?>

    <!-- <?= $form->field($model, 'total_harga')->textInput() ?> -->
    <?= $form->field($model, 'total_harga')->widget(\yii\widgets\MaskedInput::className(), [
        'clientOptions' => [
            'alias' => 'numeric',
            'groupSeparator' => ',',
            'autoGroup' => true,
            'removeMaskOnSubmit' => true,
        ],
    ]) ?>

    <!-- <?= $form->field($model, 'status')->textInput(['maxlength' => true]) ?> -->
    <?= $form->field($model, 'status')->dropDownList([
        'belum lunas' => 'Belum Lunas',
        'lunas' => 'Lunas',
    ]) ?>
    <br>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>