<header>
    <?php

    use yii\bootstrap5\Html;
    use yii\bootstrap5\Nav;
    use yii\bootstrap5\NavBar;

    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar navbar-expand-md navbar-dark bg-dark fixed-top',
        ],
    ]);
    $menuItems = [
        ['label' => 'Home', 'url' => ['/site/index']],
        ['label' => 'About', 'url' => ['/site/about']],
        ['label' => 'Contact', 'url' => ['/site/contact']],
        [
            'label' => 'Master',
            'items' => [
                // ['label' => 'Product', 'url' => ['/product/index']],
                // ['label' => 'Kategori', 'url' => ['/kategori/index']],
                ['label' => 'Pasien', 'url' => ['/pasien/index']],
                ['label' => 'Dokter', 'url' => ['/dokter/index']],
                ['label' => 'Penyakit', 'url' => ['/penyakit/index']],
                ['label' => 'Kategori Obat', 'url' => ['/kategoriObat/index']],
                ['label' => 'Obat', 'url' => ['/obat/index']],
                ['label' => 'Jadwal Praktik', 'url' => ['/jadwalPraktik/index']],
            ],
        ],
    ];
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Signup', 'url' => ['/site/signup']];
    }

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