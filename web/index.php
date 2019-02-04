<?php

use helpers\UserService;

include('../helpers/app.php');

$userService = new UserService();
$userService->baseUrl = 'http://test-api.yunews.kz/v1';
$userService->auth('77771111111', 'Wwwqqq111');
$response = $userService->person();

d($response);
