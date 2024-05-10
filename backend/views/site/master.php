<?php

/** @var yii\web\View $this */

$this->title = 'My Yii Application';
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

        <p class="lead">Selamat Datang di Menu Master Aplikasi</p>

        <!-- <p><a class="btn btn-lg btn-success" href="https://www.yiiframework.com">Get started with Yii</a></p> -->
    </div><br><br>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <a class="jur btn btn-outline-primary" href="../pasien/index">
                    <i class="fa-solid fa-recycle"></i>
                    <div class="text" style="color: black;"> pasien &raquo;</div>
                </a>
            </div>
            <div class="col-lg-4">
                <a class="jur btn btn-outline-secondary" href="../dokter/index">
                    <div class="text" style="color: black;"> Dokter &raquo;</div>
                </a>
            </div>
            <div class="col-lg-4">
                <a class="jur btn btn-outline-success" href="../penyakit/index">
                    <div class="text" style="color: black;">Penyakit &raquo;</div>
                </a>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-lg-4">
                <a class="jur btn btn-outline-danger" href="../kategori-obat/index">
                    <i class="fa-solid fa-recycle"></i>
                    <div class="text" style="color: black;"> Kategori Obat &raquo;</div>
                </a>
            </div>
            <div class="col-lg-4">
                <a class="jur btn btn-outline-warning" href="../obat/index">
                    <div class="text" style="color: black;"> Obat &raquo;</div>
                </a>
            </div>
            <div class="col-lg-4">
                <a class="jur btn btn-outline-info" href="../jadwal-praktik/index">
                    <div class="text" style="color: black;">jadwal Praktik &raquo;</div>
                </a>
            </div>
        </div>
    </div>
</div>