<?php

/** @var yii\web\View $this */

$this->title = 'D Hospital';
?>
<br>
<div class="p-5 text-light rounded-3" style="background-color: #344C64;">
    <div class="container-fluid py-5">
        <h1 class="display-5 fw-bold">Laporan Aktifitas Klinik</h1>
        <p class="col-md-8 fs-4">Laporan Pendapatan Klinik Bulan ini: </p>
        <h1>Rp. <?= Yii::$app->formatter->asInteger($totalHargaBulanIni) ?></h1>
        <!-- <button class="btn btn-primary btn-lg" type="button">Example button</button> -->
    </div>
</div>
<br>
<div class="row align-items-md-stretch">
    <div class="col-md-6">
        <div class="h-100 p-5 text-light rounded-3" style="background-color: #577B8D;">
            <h2>Jumlah Kunjungan Pasien bulan Ini </h2>
            <h1><?= $jumlahTransaksiBulanIni ?></h1>
            <!-- <button class="btn btn-outline-light" type="button">Example button</button> -->
        </div>
    </div>
    <div class="col-md-6">
        <div class="h-100 p-5 text-light border rounded-3" style="background-color:#57A6A1">
            <h2>Jumlah Pasien yang pernah berkunjung</h2>
            <h1><?= $jumlahPasien?></h1>
            <!-- <button class="btn btn-outline-light" type="button">Example button</button> -->
        </div>
    </div>
</div>
<br>
<div class="p-5 text-dark rounded-3" style="background-color: #E2DFD0;">
    <div class="container-fluid py-5">
        <h1 class="display-5 fw-bold">Aktifitas Kunjungan Pasien Selama 1 Tahun Terakhir</h1>
        <!-- <p class="col-md-8 fs-4">Laporan Pendapatan Klinik Bulan ini: </p> -->
        <canvas id="transactionChart" width="400" height="200"> </canvas>
<script>
    var ctx = document.getElementById('transactionChart').getContext('2d');
    var transactionChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: <?= json_encode(array_column($transactionData, 'month')) ?> ,
            datasets: [{
                label: 'Jumlah Transaksi',
                data: <?= json_encode(array_column($transactionData, 'count')) ?> ,
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
        <!-- <button class="btn btn-primary btn-lg" type="button">Example button</button> -->
    </div>
</div>
