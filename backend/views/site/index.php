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

        <p class="lead">Selamat Datang di Sistem Infromasi Rumah Sakit Daffa</p>

        <!-- <p><a class="btn btn-lg btn-success" href="https://www.yiiframework.com">Get started with Yii</a></p> -->
    </div><br><br>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <a class="jur btn btn-outline-secondary" href="site/master">
                    <i class="fa-solid fa-recycle"></i>
                    <div class="text"> Master &raquo;</div>
                </a>
            </div>
            <div class="col-lg-4">
                <a class="jur btn btn-outline-secondary" href="site/transaksi">
                    <div class="text"> Transaksi &raquo;</div>
                </a>
            </div>
            <div class="col-lg-4">

                <a class="jur btn btn-outline-secondary" href="informasi">
                    <div class="text">Informasi &raquo;</div>
                </a>
            </div>
        </div>
    </div>
</div>