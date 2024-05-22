<?php

use backend\models\KategoriObat;
use kartik\select2\Select2;
use kartik\select2\Select2Asset;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\Obat $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="obat-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nama_obat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_kategori')->dropDownList(ArrayHelper::map(KategoriObat::find()->all(),
            'id',
            function ($kategori) {
                return $kategori->id . ' - ' . $kategori->nama_kategori;
            }
        ),
        ['prompt' => 'Pilih Kategori']
    ) ?>


    <!-- <?= $form->field($model, 'harga_obat')->textInput() ?> -->
    <?= $form->field($model, 'harga_obat')->widget(\yii\widgets\MaskedInput::className(), [
        'clientOptions' => [
            'alias' => 'numeric',
            'groupSeparator' => ',',
            'autoGroup' => true,
            'removeMaskOnSubmit' => true,
        ],
    ]) ?>




    <!-- <?= $form->field($model, 'stok_obat')->textInput() ?> -->
    <?= $form->field($model, 'stok_obat')->widget(\yii\widgets\MaskedInput::className(), [
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