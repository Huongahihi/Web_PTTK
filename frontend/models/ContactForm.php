<?php

namespace frontend\models;

use common\components\FEmail;
use common\components\FHtml;
use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class ContactForm extends Model
{
    public $name;
    public $email;
    public $phone;
    public $address;
    public $title;
    public $content;



    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [

            [['name', 'email', 'phone', 'title', 'content'], 'filter', 'filter' => 'trim'],

            [['name', 'email', 'title', 'content'], 'required'],
            [['content'], 'string'],
            // email has to be a valid email address
            ['email', 'email'],
            [['name', 'email', 'phone', 'title'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'verifyCode' => 'Verification Code',
        ];
    }

    /**
     * Sends an email to the specified email address using the information collected by this model.
     *
     * @param string $email the target email address
     * @return boolean whether the email was sent
     */
    public function sendEmail()
    {
        return self::sendEmailToAdmin();
    }

    public function sendEmailToAdmin()
    {
        return FEmail::sendEmailFromAdmin($this->email, $this->name, FEmail::MAIL_CONTACT, ['name' => $this->name, 'email' => $this->email, 'title' => $this->title, 'content' => $this->content], 'message', 'html');
    }
}