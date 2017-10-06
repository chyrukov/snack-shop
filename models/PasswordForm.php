<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * LoginForm is the model behind the login form.
 *
 * @property User|null $user This property is read-only.
 *
 */
class PasswordForm extends Model
{
    public $password;
    public $password_repeat;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['password'], 'required'],
            ['password_repeat', 'compare', 
                'compareAttribute'=>'password', 'message'=>"Пароли не совпадают"],
        ];
    }
    
    public function attributeLabels()
    {
        return [
            'password' => 'Новый пароль',
            'password_repeat' => 'Повтор',
        ];
    }

}
