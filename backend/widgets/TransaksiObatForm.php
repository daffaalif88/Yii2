namespace backend\widgets;

use yii\base\Widget;
use backend\models\TransaksiObat;

class TransaksiObatForm extends Widget
{
    public $model;

    public function init()
    {
        parent::init();
        if ($this->model === null) {
            $this->model = new TransaksiObat();
        }
    }

    public function run()
    {
        return $this->render('transaksiObatForm', [
            'model' => $this->model,
        ]);
    }
}