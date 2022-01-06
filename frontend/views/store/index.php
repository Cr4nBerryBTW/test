<?php

use app\models\Store;
use yii\bootstrap4\Modal;
use yii\helpers\Html;
use yii\helpers\Url;
use kartik\grid\ActionColumn;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use kartik\grid\SerialColumn;
/* @var $this yii\web\View */
/* @var $searchModel frontend\models\StoreSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Stores';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="store-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Store', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php Modal::begin([
        'id' => 'modal',
        'size' => 'modal-sm',
        'clientOptions' => ['backdrop' => 'static', 'keyboard' => false]
    ]);
    echo "<div id='modalContent'></div>";
    Modal::end();?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => SerialColumn::class],
            [
                'attribute'=>'name',
                'format'=>'raw',
                'value' => function($store)
                {
                    return
                        Html::tag('p',$store->name,[ 'value' => Url::toRoute(['view', 'id' => $store->id]),'id' => 'modal_link', 'class'=>'no-pjax']);
                }
            ],
            'date',
            [
                'class' => ActionColumn::class,
                'dropdown' => 'true',
                'template' => '{update} {delete}',
                'urlCreator' => function ($action, Store $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>

<?php
    $this->registerJs("
        $(function (){
            var links = document.querySelectorAll('#modal_link');
            for (var i = 0; i < links.length; i++) {
                links[i].onclick = function(){
                $('#modal').modal('show')
                    .find('#modalContent')
                    .load($(this).attr('value'));
                };
            }
        });
    ");
?>

    <?php Pjax::end(); ?>

</div>





