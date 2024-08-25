<?php

namespace app\models;

use DateTime;
use Yii;

/**
 * This is the model class for table "task".
 *
 * @property int $id
 * @property string $title
 * @property int|null $priority
 * @property int $status_id
 * @property string|null $description
 * @property string|null $expiration_date
 * @property int $user_id
 * @property string|null $created_at
 * @property string|null $updated_at
 *
 * @property TaskStatus $status
 * @property User $user
 */
class Task extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'task';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'status_id', 'user_id'], 'required'],
            [['priority', 'status_id', 'user_id'], 'integer'],
            [['description'], 'string'],
            [['expiration_date', 'created_at', 'updated_at'], 'safe'],
            [['title'], 'string', 'max' => 255],
            [['status_id'], 'exist', 'skipOnError' => true, 'targetClass' => TaskStatus::class, 'targetAttribute' => ['status_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'priority' => 'Priority',
            'status_id' => 'Status ID',
            'description' => 'Description',
            'expiration_date' => 'Expiration Date',
            'user_id' => 'User ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[Status]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStatus()
    {
        return $this->hasOne(TaskStatus::class, ['id' => 'status_id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }

    public function beforeSave($insert)
    {
        $dateTime = new DateTime('now');
        if (parent::beforeSave($insert)) {
            $this->updated_at = $dateTime->format('Y-m-d H:i:s');
            return true;
        }
        return false;
    }
}
