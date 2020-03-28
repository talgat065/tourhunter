<?php

use yii\widgets\Pjax;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider \yii\data\ActiveDataProvider */
/* @var $userSearch \app\models\UserSearch */

$this->title = 'TourHunter';
?>
<div class="site-index">

    <div class="jumbotron">

        <p class="left">Users's list</p>

        <?php Pjax::begin(); ?>
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $userSearch,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                'username',
                [
                    'attribute' => 'balance',
                    'format' => ['decimal', 2],
                ],
                [
                    'format' => 'raw',
                    'value' => function($model){
                        return \yii\helpers\Html::a('<span class="glyphicon glyphicon-plus-sign"></span>',
                            \yii\helpers\Url::to(['user/transfer', 'userId' => $model->id]), [
                                'title' => \Yii::t('yii', 'Add'),
                                'data-pjax' => '1',
                            ]);
                    }
                ],
            ],
        ]); ?>
        <?php Pjax::end(); ?>
    </div>
</div>
