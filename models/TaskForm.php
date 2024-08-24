<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class TaskForm extends Model
{
  public $title;
  public $priority;
  public $status_id;
  public $description;
  public $expiration_date;
  public $user_id;

  /**
   * @return array the validation rules.
   */
  public function rules()
  {
    return [
      [['title', 'priority', 'status_id', 'description', 'expiration_date'], 'required'],
    ];
  }
}
