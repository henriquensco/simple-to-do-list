<?php


namespace Unit\services;

use app\services\TaskService;
use \UnitTester;

class TaskServiceTest extends \Codeception\Test\Unit
{

    protected UnitTester $tester;

    protected TaskService $taskService;

    protected $userId = 1;

    protected function _before()
    {
        $this->taskService = new TaskService($this->userId);
    }

    public function testCreateTask()
    {
        $result = $this->taskService->create((object)[
            'title' => 'Tarefa de Teste',
            'priority' => '0',
            'status_id' => 1,
            'description' => 'Descrição da tarefa',
            'expiration_date' => date('Y-m-d')
        ]);

        $this->assertIsArray($result);
    }

    public function testListTasks()
    {
        $result = $this->taskService->list(['status_id' => null, 'priority' => null], []);
        $this->assertIsArray($result);

        $result = $this->taskService->list(['status_id' => 1, 'priority' => 0], []);
        $this->assertIsArray($result);

        $result = $this->taskService->list(['status_id' => 1, 'priority' => 0], ['created_at' => 'created_at_asc']);
        $this->assertIsArray($result);
    }

    public function testGetTask()
    {
        $getTasks = $this->taskService->list(['status_id' => null, 'priority' => null], ['created_at' => 'created_at_asc']);

        $result = $this->taskService->get($getTasks[0]->id);
        $this->assertIsObject($result);
    }

    public function testUpdateTask()
    {
        $getTasks = $this->taskService->list(['status_id' => null, 'priority' => null], ['created_at' => 'created_at_asc']);

        $update = $this->taskService->update((object)[
            'title' => 'Tarefa de Teste - Update',
            'priority' => '0',
            'status_id' => 1,
            'description' => 'Descrição da tarefa',
            'expiration_date' => date('Y-m-d')
        ], $getTasks[0]->id);

        $this->assertIsArray($update);
    }

    public function testDeleteTask()
    {
        $getTasks = $this->taskService->list(['status_id' => null, 'priority' => null], ['created_at' => 'created_at_asc']);

        $delete = $this->taskService->delete($getTasks[0]->id);
        $this->assertIsArray($delete);
    }
}
