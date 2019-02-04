<?php

use phpbundle\rest\domain\entities\HttpRequestEntity;
use phpbundle\rest\domain\helpers\HttpRest;

function d($value) {
    if(is_object($value)) {
        if($value instanceof \yii\base\Arrayable) {
            $value = $value->toArray();
        } /*else {
            $value = \yii\helpers\ArrayHelper::toArray($value);
        }*/
    }

    $value = print_r($value, true);
    $value = "<pre><code>{$value}</code></pre>";

    echo $value;
    exit;
}

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

function app_autoloader($class) {
    $path = __DIR__ . '/../' . sprintf('%s.php', $class);
    $path = realpath($path);
    if (file_exists($path)) {
        require($path);
    }
}
