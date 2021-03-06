<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<?php $form = ActiveForm::begin() ?>
<?= $form->field($model, 'username')->textInput() ?>
<?= $form->field($model, 'passwordHash')->passwordInput() ?>
<?= $form->field($model, 'mobile')->textInput() ?>
<?= $form->field($model, 'idcard')->textInput() ?>
<?= $form->field($model, 'status')->radioList(['0'=>'禁用','1'=>'启用'])->label('状态'); ?>
<div class='form-group'>
    <?= Html::submitButton('提交', ['class' => 'btn btn-primary']) ?>
</div>
<?php ActiveForm::end() ?>
