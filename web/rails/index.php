<?php

use yii2rails\app\domain\helpers\Env;
use yii2rails\domain\enums\Driver;
use yii2rails\domain\helpers\DomainHelper;

$name = 'frontend';
@include_once(__DIR__ . '/../../vendor/yii2rails/yii2-app/src/App.php');
if(!class_exists(App::class)) {
    die('Run composer install');
}
App::init($name);

// ===

$env = [
    'servers' => [
        'core' => [
            'domain' => 'http://test-api.yunews.kz/',
        ],
    ],
    'domain' => [
        'driver' => [
            'primary' => Driver::CORE,
        ],
    ],
];
$domains = [
    'account' => 'yii2module\account\domain\v2\Domain',
];
Env::merge($env);
DomainHelper::defineDomains($domains);

/*$response = App::$domain->account->auth->authentication('77771111111', 'Wwwqqq111');*/
$response = App::$domain->account->auth->authentication2([
    'login' => '77771111111',
    'password' => 'Wwwqqq111',
]);
App::$domain->account->auth->login($response);
prr(App::$domain->account->auth->identity,1,1);

//prr($response,1,1);

/*use helpers\UserService;

include('../vendor/yii2rails/yii2-app/src/php/app.php');

$userService = new UserService();
$userService->baseUrl = 'http://test-api.yunews.kz/v1';
$userService->auth('77771111111', 'Wwwqqq111');
$response = $userService->person();

d($response);*/
