<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;
use yii\data\ActiveDataProvider;
use app\models\Results;


/* @var $this yii\web\View */
/* @var $model app\models\Experement */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Experements', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="experement-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_exp], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_exp], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_exp',
            'date',
            'time',
            'name',
            'bones_num',
            'throws',
        ],
    ]) ?>
    
    <?php  
        
        $dataProvider = new ActiveDataProvider([
          'query' => Results::find()->
                where(['id_exp' => $model->id_exp])  
            
        ]);
        
        echo GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id_result',
            'id_exp',
            'num',
            'count',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]) ?>

</div>
