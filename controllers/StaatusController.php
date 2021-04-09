<?php


namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Status;

class StaatusController extends Controller
{

    public function actionCreate(){
        $model = new Status;
        $isPost = $model->load(Yii::$app->request->post());
        if ( $isPost && $model->validate()){

            // valid data received in $model

            return $this ->render('view', ['model'=>$model]);
        }else {
            return $this ->render('create',['model'=>$model]);
        }
    }

}