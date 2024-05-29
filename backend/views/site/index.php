<?php

/** @var yii\web\View $this */

use backend\models\JadwalPraktik;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\Url;

$this->title = 'D Hospital';
?>

<style>
    .jur {
        width: 350px;
        height: 250px;
        display: flex;
        justify-content: center;
        align-items: center;
    }
</style>

<head>
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">

</head>
<div class="site-index">

    <div class="jumbotron text-center bg-transparent">
        <h1 class="display-4"><strong>Selamat Datang!</strong> </h1><br>

        <p class="lead">Selamat Datang di Sistem Infromasi Klinik Daffa</p>

        <!-- <p><a class="btn btn-lg btn-success" href="https://www.yiiframework.com">Get started with Yii</a></p> -->
    </div><br><br>

    <div class="body-content">
        <!-- <div class="container"> -->
        <div class="row">
            <div class="col">
                <div class="card" style="color:antiquewhite">
                    <div class="card-body rounded-3" style="background-color:#0A2647;">
                        <h5>Jumlah Pasien</h5>
                        <h1><?= $jumlahPasien ?></h1>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card" style="color:antiquewhite">
                    <div class="card-body rounded-3" style="background-color: #144272">
                        <h5>Jumlah Dokter</h5>
                        <h1><?= $jumlahDokter ?></h1>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card" style="color:antiquewhite">
                    <div class="card-body rounded-3" style="background-color:#205295;">
                        <h5>Jumlah Transaksi</h5>
                        <h1><?= $jumlahTransaksi ?></h1>
                    </div>
                </div>
            </div>
        </div>
        <!-- </div> -->
        <hr>
        <!-- <h1>Jadwal Praktik</h1> -->
    </div>

    <div class="p-5 text-light rounded-3" style="background-color: #344C64;">
        <div class="container-fluid py-5">
            <h1 class="display-5 fw-bold">Jadwal Praktik Klinik</h1>

            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                // 'filterModel' => $searchModel,
                'tableOptions' => ['class' => 'table'],
                'headerRowOptions' => ['style' => 'display:none'],
                'summary' => false, 
                'rowOptions' => ['class' => 'text-light'], 
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    // 'id',
                    [
                        'attribute' => 'Hari',
                        'contentOptions' => ['class' => 'my-cell'],  // Menambahkan kelas my-cell ke kolom Hari
                    ],
                    [
                        'attribute' => 'jam_mulai',
                        'contentOptions' => ['class' => 'my-cell'],  // Menambahkan kelas my-cell ke kolom jam_mulai
                    ],
                    [
                        'attribute' => 'jam_selesai',
                        'contentOptions' => ['class' => 'my-cell'],  // Menambahkan kelas my-cell ke kolom jam_selesai
                    ],
                ],
            ]); ?>

        </div>
    </div>
</div>