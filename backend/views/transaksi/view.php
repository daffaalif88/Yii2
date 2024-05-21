<?php

use app\models\TransaksiPenyakit;
use backend\models\TransaksiObat;
use backend\models\TransaksiTindakan;
use yii\bootstrap5\ActiveForm;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\web\View;

/** @var yii\web\View $this */
/** @var backend\models\Transaksi $model */

$this->title = $model->id;
// $this->name = $model->name
$this->params['breadcrumbs'][] = ['label' => 'Transaksi', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="transaksi-view">

    <h1>Kode Transaksi: <?= Html::encode($this->title) ?></h1>

    <p>
        <div class="btn-group" role="group" aria-label="Basic example">
            <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
            <?php
        if ($model->status == 'lunas') {
            echo Html::a('Print', ['print', 'id' => $model->id], ['class' => 'btn btn-success', 'target' => '_blank']);

        } else {
            echo Html::a('Print', '#', ['class' => 'btn btn-success disabled', 'onclick' => 'return false;', 'title' => 'Pembayaran belum lunas']);
        }
        ?>
        </div>


    </p>
    <br>
    <h1>Detail Transaksi</h1>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
                'attribute' => 'id_pasien [nama]',
                'value' => function ($model) {
                    return $model->pasien->id . ' - [' . $model->pasien->nama_pasien . ']';
                }
            ],
            [
                'attribute' => 'id_dokter [nama]',
                'value' => function ($model) {
                    return $model->dokter->id . ' - [' . $model->dokter->nama_dokter . ']';
                }
            ],
            [
                'attribute' => 'id_jadwal_praktik [hari]',
                'value' => function ($model) {
                    return $model->jadwalPraktik->id . ' - [' . $model->jadwalPraktik->Hari . ']';
                }
            ],
            'tanggal_transaksi',
            [
                'attribute' => 'total_harga',
                'value' => function ($model) {
                    return 'Rp. ' . number_format($model->getTotalHarga(), 0, '', ',');
                }
            ],
            'status',
        ],
    ]) ?>
    <hr>
    <section id="transaksi-obat">
        <h3>Daftar Obat Yang Dibeli:</h3>
        <!-- <button class="btn btn-primary">Tambah Obat</button> -->
        <!-- <a href="../transaksi-obat/create" class="btn btn-primary">Tambah Obat</a> -->
        <!-- Button trigger modal -->
        <!-- Modal -->
        <p class="d-inline-flex gap-1">
            <a class="btn btn-outline-primary" data-bs-toggle="collapse" href="#multiCollapseExample1" role="button"
                aria-expanded="false" aria-controls="multiCollapseExample1">Tambah Obat</a>
        </p>
        <div class="row">
            <div class="col">
                <div class="collapse multi-collapse" id="multiCollapseExample1">
                    <!-- Isi form -->
                    <div class="card card-body">

                        <?php
                    echo $this->render('@app/views/transaksi-obat/_formTransaksi', [
                        'model' => $model2,  // Pastikan Anda mengirim model yang tepat yang dibutuhkan oleh _form.php
                    ]);
                    
                    ?>
                    </div>
                </div>
            </div>
        </div>
        <?= GridView::widget([
        'dataProvider' => new \yii\data\ArrayDataProvider(['allModels' => $transaksiObat]),
        'columns' => [
            // 'id',
            [
                'attribute' => 'Id Obat [nama]',
                'value' => function ($model) {
                    return $model->obat->id . ' - [' . $model->obat->nama_obat . ']';
                }
            ],
            'jumlah',
            [
                'attribute' => 'Harga Satuan',
                'value' => function ($model) {
                    return 'Rp. ' . number_format($model->obat->harga_obat, 0, '', ',');
                }
            ],
            [
                'attribute' => 'Total',
                'value' => function ($model) {
                    return 'Rp. ' . number_format($model->obat->harga_obat * $model->jumlah, 0, '', ',');
                }
            ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, TransaksiObat $model, $key, $index, $column) {
                    // Mengecek aksi (action) yang sedang dibuat URL-nya
                    if ($action === 'delete') {
                        // Jika aksi adalah 'delete', URL diarahkan ke 'transaksi/delete-obat'
                        return Url::to(['transaksi/delete-obat', 'id' => $model->id]);
                    } else {
                        // Untuk aksi lain, gunakan URL default
                        return Url::toRoute([$action, 'id' => $model->id]);
                    }
                },
                'visibleButtons' => [
                    'view' => false,  // Menonaktifkan tombol "View"
                    'update' => false,  // Menonaktifkan tombol "Edit"
                    'delete' => true,  // Mengaktifkan tombol "Delete"
                ],
            ],
        ],
    ]) ?>

    </section>
    <hr>
    <section id="transaksi-tindakan">
        <h3>Daftar Tindakan Yang Dilakukan</h3>
        <!-- <a href="../transaksi-tindakan/create" class="btn btn-primary">Tambah Obat</a> -->
        <p class="d-inline-flex gap-1">
            <a class="btn btn-outline-primary" data-bs-toggle="collapse" href="#multiCollapseExample2" role="button"
                aria-expanded="false" aria-controls="multiCollapseExample1">Tambah Tindakan</a>
        </p>
        <div class="row">
            <div class="col">
                <div class="collapse multi-collapse" id="multiCollapseExample2">
                    <!-- Isi form -->
                    <div class="card card-body">

                        <?php
                    echo $this->render('@app/views/transaksi-tindakan/_formTransaksi', [
                        'model' => $model3,  // Pastikan Anda mengirim model yang tepat yang dibutuhkan oleh _form.php
                    ]);
                    
                    ?>
                    </div>
                </div>
            </div>
        </div>
        <?= GridView::widget([
        'dataProvider' => new \yii\data\ArrayDataProvider(['allModels' => $transaksiTindakan]),
        'columns' => [
            // 'id',
            [
                'attribute' => 'Id Tindakan [nama]',
                'value' => function ($model) {
                    return $model->tindakan->id . ' - [' . $model->tindakan->nama_tindakan . ']';
                }
            ],
            [
                'attribute' => 'Harga Tindakan',
                'value' => function ($model) {
                    return 'Rp. ' . number_format($model->tindakan->tarif, 0, '', ',');
                }
            ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, TransaksiTindakan $model, $key, $index, $column) {
                    // Mengecek aksi (action) yang sedang dibuat URL-nya
                    if ($action === 'delete') {
                        // Jika aksi adalah 'delete', URL diarahkan ke 'transaksi/delete-obat'
                        return Url::to(['transaksi/delete-tindakan', 'id' => $model->id]);
                    } else {
                        // Untuk aksi lain, gunakan URL default
                        return Url::toRoute([$action, 'id' => $model->id]);
                    }
                },
                'visibleButtons' => [
                    'view' => false,  // Menonaktifkan tombol "View"
                    'update' => false,  // Menonaktifkan tombol "Edit"
                    'delete' => true,  // Mengaktifkan tombol "Delete"
                ],
            ],
        ],
    ]) ?>

    </section>

    <hr>

    <section id="transaksi-penyakit">
        <h3>Diagnosa Penyakit</h3>
        <!-- <a href="../transaksi-penyakit/create" class="btn btn-primary">Tambah Diagnosa</a> -->
        <p class="d-inline-flex gap-1">
            <a class="btn btn-outline-primary" data-bs-toggle="collapse" href="#multiCollapseExample3" role="button"
                aria-expanded="false" aria-controls="multiCollapseExample1">Tambah Penyakit</a>
        </p>
        <div class="row">
            <div class="col">
                <div class="collapse multi-collapse" id="multiCollapseExample3">
                    <!-- Isi form -->
                    <div class="card card-body">

                        <?php
                    echo $this->render('@app/views/transaksi-penyakit/_formTransaksi', [
                        'model' => $model4,  // Pastikan Anda mengirim model yang tepat yang dibutuhkan oleh _form.php
                    ]);
                    
                    ?>
                    </div>
                </div>
            </div>
        </div>
        <?= GridView::widget([
        'dataProvider' => new \yii\data\ArrayDataProvider(['allModels' => $transaksiPenyakit]),
        'columns' => [
            // 'id',
            [
                'attribute' => 'Id Penyakit [nama]',
                'value' => function ($model) {
                    return $model->penyakit->id . ' - [' . $model->penyakit->nama_penyakit . ']';
                }
            ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, TransaksiPenyakit $model, $key, $index, $column) {
                    // Mengecek aksi (action) yang sedang dibuat URL-nya
                    if ($action === 'delete') {
                        // Jika aksi adalah 'delete', URL diarahkan ke 'transaksi/delete-obat'
                        return Url::to(['transaksi/delete-penyakit', 'id' => $model->id]);
                    } else {
                        // Untuk aksi lain, gunakan URL default
                        return Url::toRoute([$action, 'id' => $model->id]);
                    }
                },
                'visibleButtons' => [
                    'view' => false,  // Menonaktifkan tombol "View"
                    'update' => false,  // Menonaktifkan tombol "Edit"
                    'delete' => true,  // Mengaktifkan tombol "Delete"
                ],
            ],
        ],
        ]) ?>

    </section>

    <hr>
    <h3>Konfirmasi Status Pembayaran</h3>
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'status')->dropDownList([
        'belum lunas' => 'Belum Lunas',
        'lunas' => 'Lunas',
    ]) ?>
    <!-- <br> -->

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

    <?php
if (Yii::$app->session->hasFlash('success')) {
    $this->registerJs("
        Swal.fire({
            title: 'Berhasil!',
            text: 'Data Transaksi berhasil disimpan.',
            icon: 'success',
            confirmButtonText: 'OK'
        });
    ", View::POS_END);
}
?>

</div>