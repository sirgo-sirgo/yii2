<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Experement */

$this->title = 'Create Experement';
$this->params['breadcrumbs'][] = ['label' => 'Experements', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="experement-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
