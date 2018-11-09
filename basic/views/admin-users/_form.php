<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\tables\users */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="users-form">

    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'username')->textInput(['rows' => 6]) ?>
    <?= $form->field($model, 'password')->passwordInput(['rows' => 6]) ?>
    <?= $form->field($model, 'role_id')->dropDownList(
        \yii\helpers\ArrayHelper::map(\app\models\tables\users::find()->all(), 'role_id', 'role_id')
    ) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
