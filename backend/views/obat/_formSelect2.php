<?php

use backend\models\KategoriObat;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;

?>
<?= $form->field($model, 'id_kategori')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(KategoriObat::find()->all(), 'id', function ($kategori) {
            return $kategori->id . ' - ' . $kategori->nama_kategori;
        }),
        'options' => ['placeholder' => 'Pilih Kategori'],
        'pluginOptions' => [
            'allowClear' => true,
        ],
    ]); ?>
