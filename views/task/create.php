<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var app\models\TaskForm $model */

use yii\bootstrap5\ActiveForm;
use yii\helpers\Html;

$this->title = 'Create Task';
$this->params['breadcrumbs'][] = ['label' => 'Task', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-task">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        Create a task quicly here!
    </p>

    <div class="row">
        <div class="col-lg-5">

            <?php $form = ActiveForm::begin(['id' => 'task-form']); ?>

            <?= $form->field($model, 'title')->textInput(['autofocus' => true]) ?>

            <?= $form->field($model, 'priority')->dropDownList([
                0 => '0',
                1 => '1',
                2 => '2',
                3 => '3',
                4 => '4',
                5 => '5'
            ]) ?>

            <?= $form->field($model, 'status_id')->dropDownList($taskStatus) ?>

            <?= $form->field($model, 'description')->textarea() ?>

            <?= $form->field($model, 'expiration_date')->input('date') ?>

            <div class="form-group">
                <?= Html::submitButton('Create', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
            </div>

            <?php ActiveForm::end(); ?>

        </div>
    </div>

</div>