<?php

use yii\helpers\Url;

class Taskest
{
    public function ensureThatTaskWorks(AcceptanceTester $I)
    {
        $I->amOnPage(Url::toRoute('/site/task'));
        $I->see('Tasks', 'h1');
    }
}
