<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\TransaksiPenyakit $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="transaksi-penyakit-form">

    <?php $form = ActiveForm::begin(); ?>

    <!-- <?= $form->field($model, 'id_transaksi')->textInput() ?> -->
    <?= $form->field($model, 'id_transaksi')->hiddenInput(['value' => $this->title])->label(false) ?>
    <!-- <?= $form->field($model, 'id_transaksi')->dropDownList(
                \yii\helpers\ArrayHelper::map(
                    \backend\models\Transaksi::find()->all(),
                    'id',
                    function ($transaksi) {
                        return $transaksi->id . ' - ' . $transaksi->id_pasien . ' - ' . $transaksi->pasien->nama_pasien;
                    }
                ),
                ['prompt' => 'Pilih Pasien']
            ) ?> -->

    <!-- <?= $form->field($model, 'id_penyakit')->textInput() ?> -->
    <?= $form->field($model, 'id_penyakit')->dropDownList(
        \yii\helpers\ArrayHelper::map(\backend\models\Penyakit::find()->all(), 'id', 'nama_penyakit'),
        ['id' => 'id_penyakit', 'prompt' => 'Pilih Penyakit']
    ) ?>

    <br>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php
$this->registerJs("
    $('#id_penyakit').select2({
        placeholder: 'Pilih Obat',
        allowClear: true
    });
");
?>