<?php



/* @var $this \yii\web\View */
/* @var $model \app\models\Status */

  use yii\helpers\Html;
?>

<h1>Your Status Update</strong></h1>
<p><label>Text</label>:</p>
  <?= Html::encode($model->text) ?>
<br /><br />
<p><label>Permissions</label>:</p>
<?php
echo $model->getPermissionsLabel($model->permissions);?>
<div>
<?=Html::a('На главную', ['/site/index'], ['class' => 'btn btn-primary']);?>
</div>
