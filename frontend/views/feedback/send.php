<?php

use common\widgets\Alert;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Feedback */

$this->title = Yii::t('feedback', 'Send message');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="feedback-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= Alert::widget() ?>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
