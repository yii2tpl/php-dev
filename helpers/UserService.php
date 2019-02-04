<?php

namespace helpers;

use phpbundle\rest\domain\entities\HttpRequestEntity;
use phpbundle\rest\domain\enums\HttpMethodEnum;
use phpbundle\rest\domain\helpers\HttpRest;

class UserService {

    public $baseUrl;
    private $authToken;

    function auth($login, $password) {
        $requestEntity = new HttpRequestEntity;
        $requestEntity->method = HttpMethodEnum::POST;
        $requestEntity->uri = 'auth';
        $requestEntity->body = [
            'login' => $login,
            'password' => $password,
        ];
        $data = $this->sendRequest($requestEntity);
        $this->authToken = $data['token'];
        return $data;
    }

    function person() {
        $requestEntity = new HttpRequestEntity;
        $requestEntity->method = HttpMethodEnum::GET;
        $requestEntity->uri = 'person';
        return $this->sendRequest($requestEntity);
    }

    private function sendRequest(HttpRequestEntity $requestEntity) {
        $clientClient = new HttpRest;
        $requestEntity->uri = $this->baseUrl . '/' . $requestEntity->uri;
        if($this->authToken) {
            $requestEntity->addHeader('authorization', $this->authToken);
        }
        $response = $clientClient->requestEntity($requestEntity);
        return $response->data;
    }

}
