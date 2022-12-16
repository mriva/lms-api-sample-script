<?php
namespace App;

use GuzzleHttp\Client;

class LmsApi
{
    private $client;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => API_URL,
        ]);
    }

    public function createUser($params)
    {
        $apiMethod = 'user/create';

        return $this->authCall($apiMethod, $params);
    }

    public function suspendUser($idst)
    {
        $apiMethod = 'user/edit';
        $params = [
            'idst' => $idst,
            'valid' => 0,
        ];

        return $this->authCall($apiMethod, $params);
    }

    private function authCall($apiMethod, $params)
    {
        $codice_sha1 = strtolower(sha1(implode(',', $params) . ',' . API_SECRET));
        $codice = base64_encode(API_KEY . ':' . $codice_sha1);

        $result =  $this->client->request('POST', $apiMethod, [
            'headers' => [
                'Accept' => 'application/json',
                'X-Authorization' => "FormaLMS {$codice}",
            ],
            'form_params' => $params
        ]);

        return json_decode($result->getBody()->getContents(), true);
    }
}
