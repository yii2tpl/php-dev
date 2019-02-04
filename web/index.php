<?php

use helpers\UserService;

include('../vendor/yii2rails/yii2-app/src/php/app.php');

$userService = new UserService();
$userService->baseUrl = 'http://test-api.yunews.kz/v1';
$userService->auth('77771111111', 'Wwwqqq111');
$response = $userService->person();

d($response);
