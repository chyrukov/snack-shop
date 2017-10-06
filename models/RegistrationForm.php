<?php

namespace app\models;

use dektrium\user\models\RegistrationForm as BaseForm;

class RegistrationForm extends BaseForm
{
    /**
     * @var string Password_repeat
     */
    public $password_repeat;
    
    public function rules()
    {
        $rules = parent::rules();
        $new_rules = ['password_repeat', 'compare', 
                'compareAttribute'=>'password', 'message'=>"Пароли не совпадают"];
        return array_merge($rules, $new_rules);
        
    }
}

