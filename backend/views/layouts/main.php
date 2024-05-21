<?php

/** @var \yii\web\View $this */
/** @var string $content */

use backend\assets\AppAsset;
use common\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">

<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>

        
    </style>

</head>

<body class="d-flex flex-column h-100">
    <?php $this->beginBody() ?>

    <header>
        <?php
        NavBar::begin([
            // 'brandImage' => Yii::$app->request->baseUrl . '/path/to/your/logo.png', 
            'brandLabel' => Html::encode(Yii::$app->name),
            // 'brandLabel' => Yii::$app->name,
            'brandUrl' => Yii::$app->homeUrl,
            // 'brandImage' => Yii::$app->request->baseUrl . '/backend/assets/hospital.png', 
            'options' => [
                'class' => 'navbar navbar-expand-md navbar-dark bg-dark fixed-top',
            ],
        ]);
        $menuItems = [
            ['label' => 'Home', 'url' => ['/site/index']],
            [
                'label' => 'Master',
                'items' => [
                    // ['label' => 'Product', 'url' => ['/product/index']],
                    // ['label' => 'Kategori', 'url' => ['/kategori/index']],
                    ['label' => 'Pasien', 'url' => ['/pasien/index']],
                    ['label' => 'Dokter', 'url' => ['/dokter/index']],
                    ['label' => 'Penyakit', 'url' => ['/penyakit/index']],
                    ['label' => 'Kategori Obat', 'url' => ['/kategori-obat/index']],
                    ['label' => 'Obat', 'url' => ['/obat/index']],
                    ['label' => 'Tindakan', 'url' => ['/tindakan/index']],
                    ['label' => 'Jadwal Praktik', 'url' => ['/jadwal-praktik/index']],
                ],
            ],
            [
                'label' => 'transaksi',
                'items' => [
                    // ['label' => 'Product', 'url' => ['/product/index']],
                    // ['label' => 'Kategori', 'url' => ['/kategori/index']],
                    ['label' => 'Transaksi', 'url' => ['/transaksi/index']],
                    ['label' => 'Diagnosa Penyakit', 'url' => ['/transaksi-penyakit/index']],
                    ['label' => 'Pembelian Obat', 'url' => ['/transaksi-obat/index']],
                    ['label' => 'Tindakan Yang Dilakukan', 'url' => ['/transaksi-tindakan/index']],
                ],
            ],
            ['label' => 'Laporan', 'url' => ['/site/laporan']],
        ];
        // if (Yii::$app->user->isGuest) {
        //     $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
        // }
        echo Nav::widget([
            'options' => ['class' => 'navbar-nav me-auto mb-2 mb-md-0'],
            'items' => $menuItems,
        ]);
        if (Yii::$app->user->isGuest) {
            echo Html::tag('div', Html::a('Login', ['/site/login'], ['class' => ['btn btn-link login text-decoration-none']]), ['class' => ['d-flex']]);
        } else {
            echo Html::beginForm(['/site/logout'], 'post', ['class' => 'd-flex'])
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link logout text-decoration-none']
                )
                . Html::endForm();
        }
        NavBar::end();
        ?>
    </header>

    <main role="main" class="flex-shrink-0">
        <div class="container">
            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
            <?= Alert::widget() ?>
            <?= $content ?>
        </div>
    </main>

    <footer class="footer mt-auto py-3 text-muted">
        <div class="container">
            <p class="float-start">&copy; <?= Html::encode(Yii::$app->name) ?> <?= date('Y') ?></p>
            <p class="float-end"><?= Yii::powered() ?></p>
        </div>
    </footer>

    <?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage();
