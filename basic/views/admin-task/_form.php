<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\tables\Tasks */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tasks-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'task_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'dead_line')->widget(\yii\jui\DatePicker::class, [
        'language' => 'ru',
        'dateFormat' => '2018-11-09',
    ]) ?>
    <?= $form->field($model, 'id_user_manager')->dropDownList(
        \yii\helpers\ArrayHelper::map(\app\models\tables\users::find()->all(), 'id', 'username')
    ) ?>

    <?= $form->field($model, 'id_user_accountable')->dropDownList(
        \yii\helpers\ArrayHelper::map(\app\models\tables\users::find()->all(), 'id', 'username')
    ) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
