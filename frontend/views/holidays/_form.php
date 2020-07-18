<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var TYPE_NAME $userId */
/* @var $model app\models\Holidays */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="holidays-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class='col-sm-12'>
            <?= $form->field($model, 'start')->textInput(['id'=>'datetimepicker-start','class'=>'form-control']) ?>
        </div>
    </div>

    <div class="row">
        <div class='col-sm-12'>
            <?= $form->field($model, 'end')->textInput(['id'=>'datetimepicker-end','class'=>'form-control']) ?>
        </div>
    </div>

    <?php if (Yii::$app->user->can('holidayChangeStatus')): ?>
        <?= $form->field($model, 'status')->dropDownList([
            '1' => 'На рассмотрении',
            '2' => 'Утверждено'
        ]) ?>
    <?php else: ?>
        <?= $form->field($model, 'status')->hiddenInput(['value'=> 1])->label(false) ?>
    <?php endif; ?>

    <?= $form->field($model, 'user_id')->hiddenInput(['value'=> $userId])->label(false) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
