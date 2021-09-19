<?php

/* @var $this yii\web\View */

use frontend\components\FeedbackWidget;
use yii\helpers\Html;

$this->title = 'Feedback';
?>
<div class="site-index">
    <div class="jumbotron text-center bg-transparent">
        <h1 class="display-4"><?=Yii::t('feedback','Feedback')?></h1>
        <p class="lead"><?=Yii::t('feedback','To send a message go to the &laquo;Feedback&raquo; section.')?></p>
        <p>
            <?=Html::a(
                    Yii::t('feedback','Feedback'),
                    ['feedback/send'],
                    ['class' => 'btn btn-lg btn-success']
            )?>
        </p>
    </div>
</div>
