<?php




/* @var $model Status */

use app\models\Status;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<?php $form = ActiveForm::begin();?>

<?= $form->field($model, 'text')->textArea(['rows' => '4'])->label('Status Update'); ?>

<?=
$form->field($model, 'permissions')->dropDownList($model->getPermissions(),
    ['prompt'=>'- Choose Your Permissions -']) ?>

    <div class="form-group">
        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
    </div>

<?php ActiveForm::end();?>
