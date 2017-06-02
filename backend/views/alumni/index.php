<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\modelSearch\AlumniSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Kelola Alumni';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-primary alumni-index">

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <div class="box-header with-border">
        <p>
            <?= Html::a('Tambah Alumni', ['create'], ['class' => 'btn btn-success btn-flat']) ?>
        </p>
    </div>
    <div class="box-body">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'class' => 'yii\grid\SerialColumn',
                'header' => 'No',
                'headerOptions'=>['style'=>'text-align:center;width:20px;'],
                'contentOptions'=>['style'=>'text-align:center;width:20px;']
            ],
            [
                'class'=>'kartik\grid\ExpandRowColumn',
                'width'=>'50px',
                'value'=>function ($model, $key, $index, $column) {
                    return GridView::ROW_COLLAPSED;
                },
                'detail'=>function ($model, $key, $index, $column) {
                    return Yii::$app->controller->renderPartial('view', ['model'=>$model]);
                },
                'headerOptions'=>['class'=>'kartik-sheet-style'],
                'expandOneOnly'=>true
            ],
            /*[
                'attribute' => 'id_angkatan',
                'filterType'=>GridView::FILTER_SELECT2,
                //'filter'=>NamaModel::getList(), ini array untuk dropdown model relasi
                'filterWidgetOptions'=>[
                    'pluginOptions'=>['allowClear'=>true],
                ],
                'filterInputOptions'=>['placeholder'=>'Filter Data'],
                'format'=>'raw',
            ],*/
            /*[
                'attribute' => 'id_jurusan',
                'filterType'=>GridView::FILTER_SELECT2,
                //'filter'=>NamaModel::getList(), ini array untuk dropdown model relasi
                'filterWidgetOptions'=>[
                    'pluginOptions'=>['allowClear'=>true],
                ],
                'filterInputOptions'=>['placeholder'=>'Filter Data'],
                'format'=>'raw',
            ],*/
            'nama',
            [
            'attribute' => 'id_angkatan',
            'value' => function($data){
                    return $data->getRelationField('angkatan','tahun');
                }, 
            ],
            [
            'attribute' => 'id_jurusan',
            'value' => function($data){
                    return $data->getRelationField('jurusan','nama');
                }, 
            ],
            /*[
            'attribute' => 'id_angkatan',
            'value' => function($data){
                    return $data->getRelationField('angkatan','tahun');
                }, 
            ],
            [
            'attribute' => 'id_jurusan',
            'value' => function($data){
                    return $data->getRelationField('jurusan','nama');
                }, 
            ],*/
            'photo',
            [
                'class' => 'app\components\ToggleActionColumn',
                'headerOptions'=>['style'=>'text-align:center;width:80px'],
                'contentOptions'=>['style'=>'text-align:center']
            ],
        ],
    ]); ?>
    </div>
    <?php Pjax::end(); ?>
</div>
