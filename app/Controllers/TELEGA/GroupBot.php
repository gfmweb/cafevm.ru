<?php

namespace App\Controllers\TELEGA;

use App\Controllers\BaseController;

class GroupBot extends BaseController
{
    public function index()
    {
        $chat = env('TELEGA_GROUP');
        $bot = env('TELEGRAM_USER');
       $method = 'sendChatAction';
       $fields = [
           'chat_id'=>$chat,
           'action'=>'typing'
       ];

       $result = $this->transport($method,$fields,$bot);
       echo '<pre>'; print_r($result); echo '</pre>';
    }

    private function transport(string $method, array $fields, string $token)
    {
        $options = [
            'baseURI' => 'https://api.telegram.org/bot' . $token .'/',
        ];
        $client  = \Config\Services::curlrequest($options);
        $data = $client->request('POST',
            $method,
            ['body'=>http_build_query($fields)]);
        $response = json_decode($data->getBody());

        if (isset($response->result))
        {
            return $response->result;
        }
        return 0;
    }
}
