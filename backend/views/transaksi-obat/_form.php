<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\TransaksiObat $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="transaksi-obat-form">

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
        ['prompt' => 'Pilih Transaksi Pasien']
    ) ?>


    <!-- <?= $form->field($model, 'id_obat')->textInput() ?> -->
    <?= $form->field($model, 'id_obat')->dropDownList(
        \yii\helpers\ArrayHelper::map(\backend\models\Obat::find()->all(), 'id', 'nama_obat'),
        ['prompt' => 'Pilih Obat']
    ) ?>

    <!-- <?= $form->field($model, 'jumlah')->textInput() ?> -->
    <?= $form->field($model, 'jumlah')->widget(\yii\widgets\MaskedInput::className(), [
        'clientOptions' => [
            'alias' => 'numeric',
            'groupSeparator' => ',',
            'autoGroup' => true,
            'removeMaskOnSubmit' => true,
        ],
    ]) ?>

    <br>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>