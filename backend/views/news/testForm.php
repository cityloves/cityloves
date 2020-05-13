<?php
/** @var \yii\web\View $this */
$js = <<<JS
    $("#idForm").submit(function(e) {
        e.preventDefault();
    
        var form = $(this);
        var url = form.attr('action');
        $.ajax({
               type: "POST",
               url: url,
               data: form.serialize(),
                success: function (res) {
                    if (res.code === 200) {
                        layer.msg(res.message, {icon: 1});
                        setTimeout(function () {
                            window.parent.location.reload();
                        }, 2000)
                    } else {
                        layer.alert(res.message, {closeBtn: 0, icon: 5});
                    }
                    cloaseLoading();
                },
                error: function () {
                    layer.alert('系统繁忙,请稍后重试!', {closeBtn: 0, icon: 5});
                    cloaseLoading();
                }
             });
    });
JS;
$this->registerJs($js);

?>
<br>

<table style="margin-left: 50px;">
    <tr>
        <td>融资方：</td>
        <td>票据号码：</td>
    </tr>
    <tr>
        <td>承兑人：</td>
        <td>汇票到期日：</td>
    </tr>

    <tr>
        <form id="idForm" action="/news/test">
        <td>确认结果： <input type="radio" value="endorsed" name="status">质押已完成</td>
        <td><input type="radio" value="failed" name="status">质押无法完成</td>
    </tr>
</table>
<br>
<div class="text-center" style="margin-top: 30px;">
    <button type="submit" class="btn btn-info" id="submit-endorsement" style="margin-top: 20px">&nbsp确认&nbsp</button>
</div>
        </form>
