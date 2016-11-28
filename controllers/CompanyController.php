<?php


namespace app\controllers;

use Yii;
use yii\base\Controller;
use app\models\CompanyForm;

class CompanyController extends Controller
{
    public function actionCompany()
    {
        $model = Yii::createObject('app\models\CompanyForm');
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            Yii::$app->session->setFlash('success', 'Success!');
        }

        return $this->render('company', ['model' => $model]);
        }
}