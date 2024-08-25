<?php

namespace tests\unit\models;

use app\models\TaskForm;
use yii\mail\MessageInterface;

class TaskFormTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    public $tester;

    public function testTaskFormValidation()
    {
        $form = new TaskForm();

        $form->attributes = [
            'title' => 'Tarefa de Teste',
            'priority' => '0',
            'status_id' => 1,
            'description' => 'Descrição da tarefa',
            'expiration_date' => '2024-12-31',
            'user_id' => 1,
        ];

        $this->assertTrue($form->validate());

        $form->title = '';
        $this->assertFalse($form->validate());
        $this->assertArrayHasKey('title', $form->getErrors());

        $form->priority = '';
        $this->assertFalse($form->validate());
        $this->assertArrayHasKey('priority', $form->getErrors());

        $form->status_id = '';
        $this->assertFalse($form->validate());
        $this->assertArrayHasKey('status_id', $form->getErrors());

        $form->description = '';
        $this->assertFalse($form->validate());
        $this->assertArrayHasKey('description', $form->getErrors());

        $form->expiration_date = '';
        $this->assertFalse($form->validate());
        $this->assertArrayHasKey('expiration_date', $form->getErrors());

        $form->user_id = '';
        $this->assertFalse($form->validate());
        $this->assertArrayHasKey('user_id', $form->getErrors());
    }
}