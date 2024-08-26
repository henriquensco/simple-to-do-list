<?php

/**
 * @link https://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license https://www.yiiframework.com/license/
 */

namespace app\commands;

use app\services\TaskStatusService;
use app\services\UserService;
use yii\console\Controller;
use yii\console\ExitCode;

/**
 * This command echoes the first argument that you have entered.
 *
 * This command is provided as an example for you to learn how to create console commands.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class SeedController extends Controller
{
    public function actionAll()
    {
        $this->actionUser();
        $this->actionTaskStatus();
    }

    public function actionUser()
    {
        $userService = new UserService();

        $createUser = $userService->create((object)[
            'first_name' => 'Henrique',
            'last_name' => 'Admin',
            'email' => 'henrique@email.com',
            'password' => 'henrique@email.com'
        ]);

        if (!$createUser) {
            echo 'Seed - This user already exists';
            return ExitCode::UNSPECIFIED_ERROR;
        }

        echo 'Seed - User created';
        return ExitCode::OK;
    }

    public function actionTaskStatus()
    {
        $taskStatusService = new TaskStatusService();

        $taskStatus = [
            [
                'title' => 'Not stated'
            ],
            [
                'title' => 'In progress'
            ],
            [
                'title' => 'In test'
            ],
            [
                'title' => 'Done'
            ]
        ];

        foreach ($taskStatus as $status) {
            $taskStatusService->create((object)$status);
        }

        echo 'Seed - Task Status created';
        return ExitCode::OK;
    }
}
