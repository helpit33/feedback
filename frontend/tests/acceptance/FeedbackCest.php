<?php

namespace frontend\tests\acceptance;

use common\fixtures\FeedbackFixture;
use common\models\Feedback;
use frontend\tests\AcceptanceTester;
use Yii;

class FeedbackCest
{
    public function _fixtures() {
        return [
            'feedback' => FeedbackFixture::class
        ];
    }

    public function checkSendCorrectData(AcceptanceTester $I)
    {
        $data = [
            'customer' => 'test customer',
            'phone' => '+7(123)456-78-90',
            'status' => 0
        ];
        $I->amOnPage('/feedback/send');
        $I->fillField('ФИО', 'test customer');
        $I->fillField('Телефон', '+7(123)456-78-90');
        $I->click('Отправить');
        $I->see('Ваше сообщение успешно отправлено!');
        $I->seeRecord('common\models\Feedback', $data);
    }

    public function checkSendIncorrectData(AcceptanceTester $I)
    {
        $data = [
            'customer' => 'test customer',
            'phone' => '8(123)456-78-90',
            'status' => 0
        ];
        $I->amOnPage('/feedback/send');
        $I->fillField('ФИО', 'test customer');
        $I->fillField('Телефон', '+7(123)456-78-90');
        $I->click('Отправить');
        $I->dontSeeRecord('common\models\Feedback', $data);
    }
}
