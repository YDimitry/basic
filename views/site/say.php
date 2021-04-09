<?php
/* @var  $this yii\web\View*/
/* @var  $targeet  String */

use yii\helpers\Html;

$this -> title = 'Say';
$this->params['breadcrumbs'][]=$this->title;

?>
<div class="site-say">

    <h1> Hello <?= Html::encode($targeet)?></h1>

    <p>Welocme to your Yii2 demo application</p>

</div>