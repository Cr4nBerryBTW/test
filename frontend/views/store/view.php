<?php



use yii\helpers\Html;
use yii\web\YiiAsset;


/* @var $this yii\web\View */
/* @var $model common\models\Store */


$this->title = 'Devices for store: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Stores', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
YiiAsset::register($this);

?>
<div class="store-view">

    <h5><?= Html::encode($this->title) ?></h5>
    <?php if (empty($model->devices)) echo '(пусто)'; else foreach ($model->devices as $device):?>
    <div class="list-group">
        <?= Html::a($device->serial_number,['device/index', 'DeviceSearch' => ['serial_number' => $device->serial_number]],['class' => 'list-group-item list-group-item-action','target' => '_blank', 'data-pjax' => "0"]); ?>
    </div>
    <?php endforeach;?>

</div>
