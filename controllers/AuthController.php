<?php

namespace app\controllers;

class AuthController extends \yii\web\Controller
{
    public function actionRegister()
    {
        return $this->render('register');
    }

}
