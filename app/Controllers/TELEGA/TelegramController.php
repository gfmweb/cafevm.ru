<?php

namespace App\Controllers\TELEGA;

use App\Controllers\BaseController;
use App\Helpers\Redis;

class TelegramController extends BaseController
{
    /**
     * @param string $method Вызываемый метод
     * @param array $fields Поля запроса
     * @return int
     */
    private function transport(string $method, array $fields, string $token):int
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
            return $response->result->message_id;
        }
        return 0;
    }

    /**
     * @param string $key Ключ для записи состояния сообщений
     * @param string $method Используемый метод
     * @param array $ids
     * @param array $fields
     * @return void
     */
    public function send(string $key, string $method, array $messageArray, array $store = null)
    {
        $token = env('TELEGRAMM');
        /*$redis = Redis::getRedis();
        if($redis->exists($key)){
            $old_value = json_decode($redis->get($key));
        }*/
        foreach ($messageArray as $message){
            $message_id =  $this->transport($method,$message['fields'],$token);
        }

        
    }

    public function sendOwner($name,$phone,$staff)
    {
        $token = env('TELEGRAMM');
        $options = [
            'baseURI' => 'https://api.telegram.org/bot' . $token .'/',
        ];
        $client  = \Config\Services::curlrequest($options);
        $data = $client->request('POST',
            'sendMessage',
            ['body'=>http_build_query(
                [
                    'chat_id' => 5693145164,
                    'text' => 'Продажа акции кофейный безлимит!'.PHP_EOL.
                        $name.PHP_EOL.'+'.$phone.PHP_EOL.'Безответсвенный ответственный: '.$staff,
                ]
            )]);
        $response = json_decode($data->getBody());
        if (isset($response->result))
        {
            return $response->result->message_id;
        }
        return 0;
    }
}
