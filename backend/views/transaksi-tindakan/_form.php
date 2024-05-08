<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\TransaksiTindakan $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="transaksi-tindakan-form">

    <?php $form = ActiveForm::begin(); ?>

    <!-- <?= $form->field($model, 'id_transaksi')->textInput() ?> -->
    <?= $form->field($model, 'id_transaksi')->dropDownList(
        \yii\helpers\ArrayHelper::map(
            \backend\models\Transaksi::find()->all(),
            'id',
            function ($transaksi) {
                return $transaksi->id . ' - ' .$transaksi->id_pasien. ' - ' . $transaksi->pasien->nama_pasien;
            }
        ),
        ['prompt' => 'Pilih Pasien']
    ) ?>

    <!-- <?= $form->field($model, 'id_tindakan')->textInput() ?> -->
    <?= $form->field($model, 'id_tindakan')->dropDownList(
        \yii\helpers\ArrayHelper::map(\backend\models\Tindakan::find()->all(), 'id', 'nama_tindakan'),
        ['prompt' => 'Pilih Tindakan']
    ) ?>

    <br>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
