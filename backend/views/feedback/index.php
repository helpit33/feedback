<?php

use common\models\Feedback;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\FeedbackSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('feedback', 'Messages');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="feedback-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php Pjax::begin(); ?>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'pager' => [
            'disabledPageCssClass' => 'page-item disabled',
            'disabledListItemSubTagOptions' => [
                'class' => 'page-link'
            ],
            'pageCssClass' => 'page-item',
            'linkOptions' => [
                 'class' => 'page-link',
            ]
        ],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'customer',
            'phone',
            [
                'attribute'=>'status',
                'filter' => Feedback::getStatusList(),
                'value' => function ($model) {
                    return $model->getStatusName();
                }
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{update}'
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
