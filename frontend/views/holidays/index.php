<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\SearchHolidays */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Holidays';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="holidays-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Holidays', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'start',
            'end',
            'status',
            [
                'attribute'=>'created_at',
                'label'=>'Создано',
                'format' =>  ['date', 'HH:mm:ss dd.MM.YYYY'],
            ],
            [
                'attribute' => 'user_id',
                'label' => 'Employee',
                'value' => function($model) {
                    return $model->user[0]->username;
                },
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update} {delete}',
                'buttons' => [
                    'update' => function ($url,$model) {
                        if ( $model->status === 2 && !Yii::$app->user->can('holidayChangeStatus') ) {
                            return Html::a(
                                '<span class="glyphicon glyphicon-pencil"></span>',
                                $url,['class'=>'disabled']);
                        } else {
                            return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url);
                        }
                    },
                    'delete' => function ($url,$model) {
                        if ( $model->status === 2 && !Yii::$app->user->can('holidayChangeStatus') ) {
                            return Html::a(
                                '<span class="glyphicon glyphicon-trash"></span>',
                                $url,['class'=>'disabled']);
                        } else {
                            return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url);
                        }
                    }
                ],
            ]
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
