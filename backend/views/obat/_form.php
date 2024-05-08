<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\Obat $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="obat-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nama_obat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_kategori')->dropDownList(
        \yii\helpers\ArrayHelper::map(\backend\models\KategoriObat::find()->all(), 'id', 'nama_kategori'),
        ['prompt' => 'Pilih Kategori']
    ) ?>

    <?= $form->field($model, 'harga_obat')->textInput() ?>

    <?= $form->field($model, 'stok_obat')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>