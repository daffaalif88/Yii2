<?php

namespace backend\controllers;

use backend\models\Dokter;
use backend\models\Pasien;
use backend\models\Transaksi;
use common\models\LoginForm;
use DateTime;
use Yii;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            // 'access' => [
            //     'class' => AccessControl::class,
            //     'rules' => [
            //         [
            //             'actions' => ['login', 'error'],
            //             'allow' => true,
            //         ],
            //         [
            //             'actions' => ['logout', 'index'],
            //             'allow' => true,
            //             'roles' => ['@'],
            //         ],
            //     ],
            // ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => \yii\web\ErrorAction::class,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {

        $jumlahPasien = Pasien::find()->count();
        $jumlahDokter = Dokter::find()->count();
        $jumlahTransaksi = Transaksi::find()->count();  // Menggunakan Active Record untuk menghitung jumlah pasien

        return $this->render('index', [
        'jumlahPasien' => $jumlahPasien,
        'jumlahDokter' => $jumlahDokter,
        'jumlahTransaksi' => $jumlahTransaksi, // Mem-pass jumlah pasien ke view
    ]);
        // return $this->render('index');
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionMaster()
    {
        return $this->render('master');
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionLaporan()
    {
        $totalHargaBulanIni = Transaksi::find()
        ->where(['between', 'tanggal_transaksi', date('Y-m-01'), date('Y-m-t')])
        ->sum('total_harga');

        $jumlahTransaksiBulanIni = Transaksi::find()
            ->where(['between', 'tanggal_transaksi', date('Y-m-01'), date('Y-m-t')])
            ->count();

        $jumlahPasien = Pasien::find()->count();

        //Chart
        $currentMonth = date('Y-m-01');  // Awal bulan ini
        $data = [];
        for ($i = 11; $i >= 0; $i--) {
            $month = (new DateTime($currentMonth))->modify("-{$i} months");
            $startOfMonth = $month->format('Y-m-01');
            $endOfMonth = $month->format('Y-m-t');

            $count = Transaksi::find()
                ->where(['between', 'tanggal_transaksi', $startOfMonth, $endOfMonth])
                ->count();

            $data[] = [
                'month' => Yii::$app->formatter->asDate($startOfMonth, 'MMM yyyy'),
                'count' => $count
            ];
        }

        return $this->render('laporan', [
            'totalHargaBulanIni' => $totalHargaBulanIni,
            'jumlahTransaksiBulanIni' => $jumlahTransaksiBulanIni,
            'jumlahPasien' => $jumlahPasien,
            'transactionData' => $data,
        ]);
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionTransaksi()
    {
        return $this->render('transaksi');
    }


    /**
     * Login action.
     *
     * @return string|Response
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $this->layout = 'blank';

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';

        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
}