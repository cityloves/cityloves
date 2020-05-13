<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
$this->registerJsFile('/js/bootstrap3.3.4.min.js', ['depends' => 'yii\web\YiiAsset']);
$this->registerJsFile('/js/My97DatePicker/WdatePicker.js', ['depends' => 'yii\web\YiiAsset']);
$this->registerCssFile('/vendor/kindeditor/4.1.11/themes/default/default.css');
$this->registerCssFile('/vendor/kindeditor/4.1.11/plugins/code/prettify.css');
$this->registerJsFile('/vendor/kindeditor/4.1.11/kindeditor-all-min.js', ['depends' => 'yii\web\YiiAsset']);
$this->registerJsFile('/vendor/kindeditor/4.1.11/lang/zh-CN.js', ['depends' => 'yii\web\YiiAsset']);
$this->registerJsFile('/vendor/kindeditor/4.1.11/plugins/code/prettify.js', ['depends' => 'yii\web\YiiAsset']);
?>

<script src="/js/jquery-1.10.1.min.js" type="text/javascript"></script>

<?php $form = ActiveForm::begin() ?>
<?= $form->field($model, 'title')->textInput() ?>
<?= $form->field($model, 'body', ['template' => '{input}', 'inputOptions' => ['style' => 'width:688px; height:350px;', 'name' => 'body', 'id' => 'namebody']])->textarea() ?>
<?= $form->field($model, 'status')->radioList(['0'=>'禁用','1'=>'启用'])->label('状态'); ?>

<div class='form-group'>
    <?= Html::submitButton('提交', ['class' => 'btn btn-primary']) ?>
</div>

<?php ActiveForm::end() ?>


<script type="text/javascript">
        function parentP(KNode) {
            if (!KNode) {
                return null;
            }
            if (KNode.name == 'body') {
                return null;
            }
            if (KNode.name == 'p') {
                return KNode;
            }
            if (KNode.parent()) {
                return parentP(KNode.parent());
            }
            return null;
        }
jQuery(document).ready(function () {
            KindEditor.lang({
                text_indent : '首行缩进'
            });
            KindEditor.plugin('text_index', function(K) {
                var self = this, name = 'text_indent';
                self.clickToolbar(name, function() {
                    var cmd = self.cmd;
                    if (cmd.sel.anchorNode) {
                        var p = K(cmd.sel.anchorNode);
                        p = parentP(p);
                        if (p && p.name == 'p') {
                            if (p.hasClass('text_indent')) {
                                p.removeClass('text_indent');
                                p.css('text-indent', '0em');
                            } else {
                                p.addClass('text_indent');
                                p.css('text-indent', '2em');
                            }
                        }
                    }
                });
            });
            KindEditor.ready(function(K) {
                var editor1 = K.create('#namebody', {
                    pasteType:1,
                    items:['source', 'preview','fontname', 'fontsize',  'forecolor', 'hilitecolor', 'bold', 'italic', 'underline', 'removeformat', '|','plainpaste','wordpaste', '|', 'justifyleft', 'justifycenter', 'justifyright','justifyfull', 'insertorderedlist','insertunorderedlist', '|', 'image', 'table', 'link', 'unlink', 'text_indent'],
                    cssPath : '/vendor/kindeditor/4.1.11/plugins/code/prettify.css',
                    uploadJson :'/vendor/kindeditor/4.1.11/php/file_manager_json.php', //指定上传文件的服务器端程序
                    fileManagerJson : '/vendor/kindeditor/4.1.11/php/file_manager_json.php',
                    allowFileManager : true,
                    
                    afterCreate : function() {
					var self = this;
					K.ctrl(document, 13, function() {
						self.sync();
						K('form[name=example]')[0].submit();
					});
					K.ctrl(self.edit.doc, 13, function() {
						self.sync();
						K('form[name=example]')[0].submit();
					});
				},
                afterBlur: function(){ // 编辑器失去焦点时将数据同步到textarea
            		this.sync(); // sync的详细作用可参考上述第2点，编辑器的基本使用
        		}
                });
                prettyPrint();
            });
        });
    </script>


    