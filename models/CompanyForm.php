<?php

namespace app\models;

use yii;
use yii\base\Model;

class CompanyForm extends Model
{
    public $nazva;
    public $identkod;
    public $email;
    public $country;
    public $year;
    public $price;
    public $url;
    public $director;
    public $directorPhoto;
    public $verificationCode;

    public function attributeLabels()
    {
        return [
            'nazva' => Yii::t('app', 'Name of company'),
            'price' => Yii::t('app', 'Share price'),
            'director' => Yii::t('app', 'Director name'),
            'verifyCode' => 'Verification Code',
        ];
    }

    public function rules()
    {
        return [
            [['nazva', 'email', 'director', 'country'], 'required'],
            ['nazva', 'match', 'pattern' => '/^[a-z]\w*$/i'],
            ['email', 'email'],
            ['year', 'string', 'length' => 4],
            ['year', 'number', 'min' => 1991, 'max' => date('Y')],
            ['email', 'trim'],
            ['url', 'url', 'defaultScheme' => 'http'],
            ['verificationCode', 'captcha'],
            ['directiorPhoto', 'image', 'extensions' => 'png, jpg',
                'minWidth' => 100, 'maxWidth' => 1000,
                'minHeigth' => 100, 'maxHeigth' => 1000,
                ],
            ['directorPhoto', 'file', 'extensions' => ['png', 'jpg'], 'maxSize' => 1024*1024],
            ['country', 'validateCountry'],
            ['identkod', 'identkodCriter'],
        ];
    }
    public function identkodCriter()
    {
        if (!empty($this->identkod)) {
            if (strlen($this->identkod)<14) {
                $this->addError('identkod', 'Identification code must consist of 14 digits.');
            } else {
                if (!preg_match('/[0-9]/', $this->identkod)) {
                    $this->addError('identkod', 'Identification code must consist only of digits.');
                }

            }
        }
    }
}