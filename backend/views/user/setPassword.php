<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use kartik\date\DatePicker;
use kartik\select2\Select2;
use app\models\Pendidikan;
use app\models\Golongan;
use app\models\Provinsi;
use app\models\Peserta;
use app\models\Agama;

$this->title = 'Set Password';

$this->params['breadcrumbs'][] = $this->title;
?>

<?php $form = ActiveForm::begin([            
    'layout'=>'horizontal',
    'fieldConfig' => [
        'horizontalCssClasses' => [
            'label' => 'col-sm-2',
            'wrapper' => 'col-sm-4',
            'error' => '',
            'hint' => '',
        ],
    ]
]); ?>

    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">Form Set Password</h3>
        </div>
        <div class="box-body">
            <div class="row">

                <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'password_konfirmasi')->passwordInput(['maxlength' => true]) ?>

            </div>
        </div>
        <div class="box-footer">
            <div class="row">
                <div class="col-sm-offset-2 col-sm-3">
                    <?= Html::submitButton('<i class="fa fa-check"></i> Set Password', ['class' => 'btn btn-success btn-flat', 'name' => 'register-button']) ?>
                </div>
            </div>
        </div>
    </div>

<?php ActiveForm::end(); ?>