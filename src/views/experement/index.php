<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Experements';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="experement-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Experement', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_exp',
            'date',
            'time',
            'name',
            'bones_num',
            // 'throws',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
