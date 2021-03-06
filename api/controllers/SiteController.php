<?php

namespace api\controllers;

use Yii;
use yii\rest\Controller;
use api\models\LoginForm;

class SiteController extends Controller
{
    public function actionIndex(): string
    {
        return 'api';
    }

    public function actionLogin()
    {
        $model = new LoginForm();
        $model->load(Yii::$app->request->bodyParams, '');
        if ($token = $model->auth()) {
            return [
                'token' => $token->token,
                'expired' => date(DATE_RFC3339, $token->expired_at),
            ];
        } else {
            return $model;
        }
    }

    protected function verbs(): array
    {
        return [
            'login' => ['post'],
        ];
    }
}
