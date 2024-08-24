<?php

/** @var yii\web\View $this */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <?php if (Yii::$app->user->isGuest): ?>
        <div class="jumbotron text-center bg-transparent mt-5 mb-5">
            <h1 class="display-4">Welcome!</h1>

            <p class="lead">Now you can manage your tasks easly with Simple To-Do List.</p>

            <p><a class="btn btn-lg btn-success" href="/login">Get started with Simple To-Do List</a></p>
        </div>
    <?php endif; ?>

    <div class="body-content">

        <?php if (!Yii::$app->user->isGuest): ?>
            <div class="jumbotron text-center bg-transparent mt-5 mb-5">
                <p><a class="btn btn-lg btn-success" href="/task">Go to my To-Do List</a></p>
            </div>
        <?php endif; ?>

        <!-- <div class="row">
            <div class="col-lg-4 mb-3">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-outline-secondary" href="https://www.yiiframework.com/doc/">Yii Documentation &raquo;</a></p>
            </div>
            <div class="col-lg-4 mb-3">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-outline-secondary" href="https://www.yiiframework.com/forum/">Yii Forum &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-outline-secondary" href="https://www.yiiframework.com/extensions/">Yii Extensions &raquo;</a></p>
            </div>
        </div> -->

    </div>
</div>