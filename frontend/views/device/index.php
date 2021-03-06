<?php

use common\models\Device;
use common\models\Store;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use kartik\grid\SerialColumn;
use kartik\grid\ActionColumn;
use kartik\grid\GridView;
use kartik\grid\DataColumn;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\DeviceSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Devices';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="device-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Device', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>



    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => SerialColumn::class],
            'serial_number',

            [
                'class' => DataColumn::class,
                'attribute' => 'Store',
                'value' => function ($device) {
                    return $device->store->name != null ? $device->store->name : '(не задан)' ;
                },
                'filter' => Select2::widget([
                    'model' => $searchModel,
                    'attribute' => 'store_id',
                    'data' => ArrayHelper::map(Store::find()->all(),'id' , 'name'),
                    'options' => ['placeholder' => 'Select a store ...', 'multiple' => true],
                    'pluginOptions' => [
                        'tokenSeparators' => [',', ' '],
                        'maximumInputLength' => 10,
                        'selectOnClose' => true,
                    ],
                ])

            ],
            'date',
            [
                'class' => ActionColumn::class,
                'dropdown' => 'true',
                'template' => '{update} {delete}',
                'urlCreator' => function ($action, Device $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                },
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>

