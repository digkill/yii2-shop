<?php

namespace frontend\forms;

use yii\base\Model;

/**
 * Signup form
 */
class SignUpForm extends Model
{
    public $username;
    public $email;
    public $password;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],
        ];
    }


}


/**

public function signup()
{
    if (!$this->validate()) {
        return null;
    }


    $user = User::signUp($this->username, $this->email, $this->password);

    //   return $user->save() && $this->sendEmail($user);
    return $user->save() ? $user : null;
}

protected function sendEmail($user)
{
    return Yii::$app
        ->mailer
        ->compose(
            ['html' => 'emailVerify-html', 'text' => 'emailVerify-text'],
            ['user' => $user]
        )
        ->setFrom([Yii::$app->params['supportEmail'] => Yii::$app->name . ' robot'])
        ->setTo($this->email)
        ->setSubject('Account registration at ' . Yii::$app->name)
        ->send();
}
 */