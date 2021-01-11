<?php

use common\models\Cars;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model muhammetsaitcelik\content\models\Company */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="company-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->label('İsim')->textInput() ?>

    <?= $form->field($model, 'car_id')->label('Arabalar')->dropDownList(ArrayHelper::map(Cars::find()->all(), 'id', 'car_name')) ?>

    <?= $form->field($model, 'establishment')->label('Kuruluş Yılı')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
