<?php
namespace frontend\components;

use common\models\Feedback;
use yii\base\Widget;
use yii\helpers\Html;

class FeedbackWidget extends Widget
{

    public function init() : void
    {
        parent::init();

    }

    public function run() : string
    {
        return $this->render('feedback', ['model' => new Feedback(['scenario' => 'send'])]);
    }
}