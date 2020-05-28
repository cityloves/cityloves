<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
?>

<?php $form = ActiveForm::begin() ?>
<?= $form->field($model, 'sn')->textInput() ?>
<?= $form->field($model, 'roleName')->textInput() ?>
<?= $form->field($model, 'roleDesc')->textInput() ?>
<?= $form->field($model, 'status')->radioList(['0'=>'禁用','1'=>'启用'])->label('状态'); ?>
<div class='form-group'>
    <?= Html::submitButton('提交', ['class' => 'btn btn-primary']) ?>
</div>
<?php ActiveForm::end() ?>
