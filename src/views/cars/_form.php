<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model muhammetsaitcelik\content\models\Cars */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cars-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'car_name')->label('İsim')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'model')->label('Modeli')->textInput() ?>

    <?= $form->field($model, 'year')->label('Yılı')->textInput() ?>

    <?= $form->field($model, 'price')->label('Ücreti')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
