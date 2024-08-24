<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var app\models\TaskForm $model */

use yii\bootstrap5\ActiveForm;
use yii\helpers\Html;

$this->title = 'Update Task';
$this->params['breadcrumbs'][] = ['label' => 'Task', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-task">
  <h1><?= Html::encode($this->title) ?></h1>

  <p>
    Update a task quicly here!
  </p>

  <div class="row">
    <div class="col-lg-5">

      <?php $form = ActiveForm::begin(['id' => 'task-form']); ?>

      <?= $form->field($model, 'title')->textInput(['autofocus' => true, 'value' => $data->title]) ?>

      <?= $form->field($model, 'priority')->dropDownList([
        0 => '0',
        1 => '1',
        2 => '2',
        3 => '3',
        4 => '4',
        5 => '5'
      ]) ?>
      
      <?= $form->field($model, 'status_id')->dropDownList($taskStatus, [
        'value' => $data->status_id
      ]) ?>

      <?= $form->field($model, 'description')->textarea([
        'value' => $data->description
      ]) ?>

      <?= $form->field($model, 'expiration_date')->input('date', [
        'value' => $data->expiration_date
      ]) ?>

      <div class="form-group">
        <?= Html::submitButton('Update', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
      </div>

      <?php ActiveForm::end(); ?>

    </div>
  </div>

</div>