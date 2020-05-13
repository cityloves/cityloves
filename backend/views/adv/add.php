<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
$this->registerJsFile('/js/My97DatePicker/WdatePicker.js', ['depends' => 'yii\web\YiiAsset']);
?>

<?php $form = ActiveForm::begin() ?>
<?= $form->field($model, 'name')->textInput() ?>
<?= $form->field($model, 'uri')->fileInput() ?>
<?= $form->field($model, 'link', ['template' => '{input}', 'inputOptions' => ['style' => 'width:688px; height:350px;']])->textarea();  ?>
<?= $form->field($model, 'status')->radioList(['0'=>'禁用','1'=>'启用'])->label('状态'); ?>
<div class="control-group">
    <label class="control-label">发布时间</label>
    <div class="controls">
        <?= $form->field($model, 'createTime', ['template' => '{input}', 'inputOptions' => ['autocomplete' => 'off', 'class' => 'm-wrap span3 Wdate', 'placeholder' => '选择发布时间', 'onclick' => 'WdatePicker({dateFmt:"yyyy-MM-dd HH:mm:ss",maxDate:\''.date('Y-m-d').'\'});']])->textInput(); ?>
        <?= $form->field($model, 'createTime', ['template' => '{error}']); ?>
    </div>
</div>
<div class='form-group'>
    <?= Html::submitButton('提交', ['class' => 'btn btn-primary']) ?>
</div>
<?php ActiveForm::end() ?>
