<?php

use phpbundle\rest\domain\entities\HttpRequestEntity;
use phpbundle\rest\domain\helpers\HttpRest;

function prr($value) {
    if(is_object($value)) {
        if($value instanceof \yii\base\Arrayable) {
            $value = $value->toArray();
        } else {
            //$value = \yii\helpers\ArrayHelper::toArray($value);
        }
    }

    $value = print_r($value, true);
    $value = "<pre><code>{$value}</code></pre>";

    echo $value;
    exit;
}

include __DIR__ . '/../vendor/autoload.php';

function getNewsCollection() {
    $requestEntity = new HttpRequestEntity;
    $requestEntity->method = 'GET';
    $requestEntity->uri = 'http://api.yunews.kz/v1/news';
    $requestEntity->addHeader('language', 'kz');
    /*$requestEntity->headers = [
        'language' => 'kz',
    ];*/
    $requestEntity->query = ['page' => 2];

    $clientClient = new HttpRest;
    $response = $clientClient->requestEntity($requestEntity);
    return $response;
}

function getAuth() {
    $requestEntity = new HttpRequestEntity;
    $requestEntity->method = 'POST';
    $requestEntity->uri = 'http://test-api.yunews.kz/v1/auth';
    $requestEntity->body = [
        'login' => '77771111111',
        'password' => 'Wwwqqq111',
    ];
    $clientClient = new HttpRest;
    $response = $clientClient->requestEntity($requestEntity);
    return $response;
}

$response = getNewsCollection();
prr($response->getHeader('X-Pagination-Current-Page'));
//prr($response->toArray());
