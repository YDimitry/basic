<?php
namespace app\models;
use yii\base\Model;


Class Status extends Model {

    const PERMISSIONS_PRIVATE = 10;
    const PERMISSIONS_PUBLIC = 20;

    public $text;
    public $permissions;

    public function rules()
    {
        return [[['text',],'required']];
    }

    public function getPermissions(){
        return array(self::PERMISSIONS_PUBLIC=>'Public',self::PERMISSIONS_PRIVATE=>'Private');
    }

    public function getPermissionsLabel($permission){
        return $permission == self::PERMISSIONS_PUBLIC?'Public':'Private';
    }


}