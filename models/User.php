<?php

namespace app\models;

use dektrium\user\models\User as BaseUser;

class User extends BaseUser
{
    public function rules()
    {
        /*$rules = parent::rules();
        $new_rules = ['password_repeat', 'compare', 
                'compareAttribute'=>'password', 'message'=>"Пароли не совпадают"];
        return array_merge($rules, $new_rules);*/
        
    }
}

