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
        \yii\helpers\ArrayHelper::map(
            \backend\models\Pasien::find()->all(),
            'id',
            function ($pasien) {
                return $pasien->id . ' - ' . $pasien->nama_pasien . '_' . $pasien->nik . '_' . $pasien->tanggal_lahir . '_' . $pasien->jenis_kelamin;
            }
        ),
        ['id' => 'id_pasien', 'prompt' => 'Pilih Pasien']
    ) ?>

    <!-- <?= $form->field($model, 'id_dokter')->textInput() ?> -->
    <?= $form->field($model, 'id_dokter')->dropDownList(
        \yii\helpers\ArrayHelper::map(
            \backend\models\Dokter::find()->all(),
            'id',
            function ($dokter) {
                return $dokter->id . ' - ' . $dokter->nama_dokter;
            }
        ),
        ['id' => 'id_dokter', 'prompt' => 'Pilih dokter']
    ) ?>

    <!-- <?= $form->field($model, 'id_jadwal_praktik')->textInput() ?> masih Bug-->
    <?= $form->field($model, 'id_jadwal_praktik')->dropDownList(
        \yii\helpers\ArrayHelper::map(
            \backend\models\JadwalPraktik::find()->all(),
            'id',
            function ($jadwal_praktik) {
                return $jadwal_praktik->id . ' - ' . $jadwal_praktik->Hari;
            }
        ),
        ['id' => 'id_jadwal_praktik', 'prompt' => 'Pilih Jadwal']
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
    <!-- <?= $form->field($model, 'total_harga')->widget(\yii\widgets\MaskedInput::className(), [
                'clientOptions' => [
                    'alias' => 'numeric',
                    'groupSeparator' => ',',
                    'autoGroup' => true,
                    'removeMaskOnSubmit' => true,
                ],
                'options' => [
                    'value' => $model->total_harga ? $model->total_harga : 0, // Menetapkan nilai default ke 0 jika total_harga belum diatur
                ],
            ]) ?> -->
    <?= $form->field($model, 'total_harga')->hiddenInput([
        'value' => $model->total_harga ? $model->total_harga : 0,
    ])->label(false) ?>


    <!-- <?= $form->field($model, 'status')->textInput(['maxlength' => true]) ?> -->
    <!-- <?= $form->field($model, 'status')->dropDownList([
                'belum lunas' => 'Belum Lunas',
                'lunas' => 'Lunas',
            ]) ?> -->
    <?= $form->field($model, 'status')->hiddenInput([
        'value' => $model->status ? $model->status : 'belum lunas',
    ])->label(false) ?>
    <br>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php
$this->registerJs("
    $('#id_pasien').select2({
        placeholder: 'Pilih Pasien',
        allowClear: true
    });
    $('#id_dokter').select2({
        placeholder: 'Pilih Dokter',
        allowClear: true
    });
    $('#id_jadwal_praktik ').select2({
        placeholder: 'Pilih Jadwal Praktik',
        allowClear: true
    });
");
?>