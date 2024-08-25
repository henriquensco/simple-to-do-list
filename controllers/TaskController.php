<?php

namespace app\controllers;

use app\models\TaskForm;
use app\models\TaskStatus;
use app\services\TaskService;
use app\services\TaskStatusService;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;

class TaskController extends Controller
{
  protected TaskService $taskService;

  function __construct()
  {
    $this->taskService = new TaskService();
  }

  public function behaviors()
  {
    return [
      'access' => [
        'class' => AccessControl::className(),
        'only' => ['index', 'view', 'update', 'delete'],
        'rules' => [
          [
            'allow' => true,
            'roles' => ['@'],
          ],
        ],
      ],
    ];
  }

  public function actionIndex()
  {
    $taskService = new TaskService();

    $orderBy = Yii::$app->request->get('orderBy', 'expiration_date_asc');
    $filters = Yii::$app->request->get('filters', ['status_id' => null, 'priority' => null]);

    $taskStatus = TaskStatus::find()->all();

    return $this->render('index', [
      'tasks' => $taskService->list($filters, $orderBy),
      'taskStatus' => $taskStatus,
      'orderBy' => $orderBy,
      'filters' => $filters
    ]);
  }

  public function actionCreate()
  {
    $model = new TaskForm();

    if ($model->load(Yii::$app->request->post())) {
      $createTask = $this->taskService->create($model);

      if ($createTask['success']) {
        Yii::$app->session->setFlash('success', 'New task created');
        return $this->redirect(['index']);
      }

      Yii::$app->session->setFlash('error', $createTask['data']);
    }

    $taskStatusService = new TaskStatusService();

    return $this->render('create', [
      'model' => $model,
      'taskStatus' => $taskStatusService->listDropDown()
    ]);
  }

  public function actionUpdate($id)
  {
    $taskForm = new TaskForm();

    $task = $this->taskService->get($id);

    if (!$task) {
      Yii::$app->session->setFlash('error', 'Task not found');
      return $this->redirect(['index']);
    }

    if ($taskForm->load(Yii::$app->request->post())) {
      $updateTask = $this->taskService->update($taskForm, $id);

      if (!$updateTask) {
        Yii::$app->session->setFlash('error', 'Error while update the task');
      } else {
        Yii::$app->session->setFlash('success', 'Task updated');
        return $this->redirect(['index']);
      }
    }

    $taskStatusService = new TaskStatusService();

    return $this->render('update', [
      'model' => $taskForm,
      'taskStatus' => $taskStatusService->listDropDown(),
      'data' => $task
    ]);
  }

  public function actionDelete($id)
  {
    $taskService = new TaskService();

    if (!$taskService->delete($id)) {
      Yii::$app->session->setFlash('error', 'Not possible delete the task');
    }

    Yii::$app->session->setFlash('success', 'You deleted the task');

    return $this->redirect(['index']);
  }
}
