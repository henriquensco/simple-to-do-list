<?php

/** @var yii\web\View $this */

use yii\helpers\Html;

$this->title = 'Tasks';
$this->params['breadcrumbs'][] = $this->title;

$this->registerCss('
tbody tr td:last-child {
    white-space: nowrap;
    width: 1px;
}');

?>
<div class="site-task">
    <div class="d-flex justify-content-between">
        <h1><?= Html::encode($this->title) ?></h1>
        <p><a class="btn btn-md btn-primary" href="/task/create">Create new task</a></p>
    </div>

    <div class="row mb-4">
        <div class="col-md-4">
            <form method="get" action="">
                <div class="input-group mb-3">
                    <label class="input-group-text" for="orderBy">Order By</label>
                    <select class="form-select" id="orderBy" name="orderBy">
                        <option value="created_at_asc" <?= $orderBy == 'created_at_asc' ? 'selected' : '' ?>>Created At (Ascending)</option>
                        <option value="created_at_desc" <?= $orderBy == 'created_at_desc' ? 'selected' : '' ?>>Created At (Descending)</option>
                        <option value="expiration_date_asc" <?= $orderBy == 'expiration_date_asc' ? 'selected' : '' ?>>Expiration Date (Ascending)</option>
                        <option value="expiration_date_desc" <?= $orderBy == 'expiration_date_desc' ? 'selected' : '' ?>>Expiration Date (Descending)</option>
                    </select>
                </div>

                <div class="input-group mb-3">
                    <label class="input-group-text" for="filters">Status</label>
                    <select class="form-select" id="filters_status" name="filters[status_id]">
                        <option value="">All status</option>
                        <?php foreach ($taskStatus as $tStatus): ?>
                            <option value="<?= $tStatus['id'] ?>" <?= $filters['status_id'] == $tStatus['id'] ? 'selected' : '' ?>><?= $tStatus['title'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="input-group mb-3">
                    <label class="input-group-text" for="filters">Priority</label>
                    <select class="form-select" id="filters_status" name="filters[priority]">

                        <option value="" <?= $filters['priority'] == null ? 'selected' : '' ?>>All priorities</option>
                        <option value="0" <?= $filters['priority'] == '0' ? 'selected' : '' ?>>0</option>
                        <option value="1" <?= $filters['priority'] == '1' ? 'selected' : '' ?>>1</option>
                        <option value="2" <?= $filters['priority'] == '2' ? 'selected' : '' ?>>2</option>
                        <option value="3" <?= $filters['priority'] == '3' ? 'selected' : '' ?>>3</option>
                        <option value="4" <?= $filters['priority'] == '4' ? 'selected' : '' ?>>4</option>
                        <option value="5" <?= $filters['priority'] == '5' ? 'selected' : '' ?>>5</option>
                    </select>
                </div>

                <button class="btn btn-outline-secondary" type="submit">Apply</button>
            </form>
        </div>
    </div>

    <table class="table table-striped">
        <thead>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Priority</th>
            <th scope="col">Status</th>
            <th scope="col">Expiration Date</th>
            <th scope="col">Actions</th>
        </thead>
        <tbody>
            <?php foreach ($tasks as $task): ?>
                <tr>
                    <th scope="row"><?= $task->id ?></th>
                    <td><?= $task->title ?></td>
                    <td><?= $task->priority ?></td>
                    <td><?= $task->status->title ?></td>
                    <td><?= $task->expiration_date ?></td>
                    <td>
                        <a class="btn btn-success" href="<?= \yii\helpers\Url::to(['/task/update?id=' . $task->id]) ?>">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                            </svg>
                        </a>

                        <a class="btn btn-danger" href="<?= \yii\helpers\Url::to(['/task/delete?id=' . $task->id]) ?>">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z" />
                                <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z" />
                            </svg>
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>