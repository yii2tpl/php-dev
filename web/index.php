<?php

use helpers\UserService;

include(__DIR__ . '/../vendor/autoload.php');
include(__DIR__ . '/../helpers/UserService.php');
include(__DIR__ . '/../helpers/func.php');

$userService = new UserService();
$userService->baseUrl = 'http://test-api.yunews.kz/v1';
$userService->auth('77771111111', 'Wwwqqq111');
$response = $userService->person();

d($response);
