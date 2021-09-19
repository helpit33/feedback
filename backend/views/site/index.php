<?php

/* @var $this yii\web\View */

use yii\helpers\Html;$this->title = 'Feedback';
?>
<div class="site-index">

    <div class="jumbotron text-center bg-transparent">
        <h1 class="display-4"><?=Yii::t('feedback','Feedback')?></h1>

        <p class="lead"><?=Yii::t('feedback', 'Control panel')?></p>

        <?=Html::a(
            Yii::t('feedback','Messages'),
            ['feedback/index'],
            ['class' => 'btn btn-lg btn-success']
        )?>
    </div>
</div>
