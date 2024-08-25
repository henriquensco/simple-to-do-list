<?php

class TaskFormCest 
{
    public function _before(\FunctionalTester $I)
    {
        $I->amOnRoute('site/task/create');
    }
  }