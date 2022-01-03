<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model LoginForm */

use common\models\LoginForm;
use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;

$this->title = 'Enter password';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    <div class="mt-5 offset-lg-3 col-lg-6">
        <h1><?= Html::encode($this->title) ?></h1>

        <p>Please fill out the field:</p>

        <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

        <?= $form->field($model, 'password')->passwordInput(['autofocus' => true]) ?>

        <div class="form-group">
            <?= Html::submitButton('Enter', ['class' => 'btn btn-primary btn-block', 'name' => 'enter-button']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>
