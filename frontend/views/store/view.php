<?php



use yii\helpers\Html;
use yii\web\YiiAsset;
use yii\widgets\DetailView;


/* @var $this yii\web\View */
/* @var $model app\models\Store */


$this->title = 'Devices for store: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Stores', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
YiiAsset::register($this);
$devices = $model->getSelectedDevices($model->id);

?>
<div class="store-view">

    <h5><?= Html::encode($this->title) ?></h5>
    <?php  foreach ($devices as $device):?>
    <div class="list-group">
        <?= Html::a($device->serial_number,['device/view', 'id' => $device->id],['class' => 'list-group-item list-group-item-action']); ?>
    </div>
    <?php endforeach;?>

</div>
