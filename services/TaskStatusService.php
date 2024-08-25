<?php

namespace app\services;

use app\models\TaskStatus;
use yii\helpers\ArrayHelper;

class TaskStatusService
{
  public function list()
  {
    return TaskStatus::find()->all();
  }

  public function listDropDown()
  {
    return ArrayHelper::map($this->list(), 'id', 'title');
  }
}