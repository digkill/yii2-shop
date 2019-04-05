<?php
/**
 * Created by PhpStorm.
 * User: @edifanoff
 * Date: 03.04.2019
 * Time: 0:40
 */

namespace services\auth;

use common\entities\User;
use frontend\forms\SignUpForm;

class SignUpService
{
    public function signUp(SignUpForm $form): User
    {
       /* Проверка на уликальность*/
        $user = User::signUp(
            $form->username,
            $form->email,
            $form->password
        );

        if (!$user->save()) {
            throw new \RuntimeException('Saving error.');
        }
        return $user;
    }
}