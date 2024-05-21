<?php

/** @var yii\web\View $this */

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
        <h1 class="display-4">Selamat Datang!</h1><br>

        <p class="lead">Selamat Datang di Sistem Infromasi Rumah Sakit Daffa</p>

        <!-- <p><a class="btn btn-lg btn-success" href="https://www.yiiframework.com">Get started with Yii</a></p> -->
    </div><br><br>

    <div class="body-content">
        <!-- <div class="container"> -->
        <div class="row" style="color:whitesmoke">
            <div class="col">
                <div class="card">
                    <div class="card-body" style="background-color:#0A2647;">
                        <h5>Jumlah Pasien</h5>
                        <h1><?= $jumlahPasien ?></h1>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-body" style="background-color: #144272">
                        <h5>Jumlah Dokter</h5>
                        <h1><?= $jumlahDokter ?></h1>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-body" style="background-color:#205295;">
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
</div>