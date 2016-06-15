<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

  <h1><?= Html::encode($this->title) ?></h1>
  <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

  <p>
    <?= Html::a('Create User', ['create'], ['class' => 'btn btn-success']) ?>
  </p>
  <?= GridView::widget([
    'dataProvider' => $dataProvider,
      'filterModel' => $searchModel,
      'columns' => [
        ['class' => 'yii\grid\SerialColumn'],

          'id',
          'username',
          'auth_key',
          //'password_hash',
          //'password_reset_token',
          // 'email:email',
          'role',
          'status',
          [
            'attribute' => 'created_at',
            'format' => ['date', 'Y-m-d H:i:s'],
          ],

          ['class' => 'yii\grid\ActionColumn'],
      ],
  ]); ?>
</div>
