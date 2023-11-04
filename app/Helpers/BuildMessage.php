<?php

namespace App\Helpers;

class BuildMessage
{
    /**
     * @param string $guest_name Имя гостя
     * @param string $guest_phone  Номер телефона
     * @param string $date  Дата бронирования
     * @param string $time  Время бронирования
     * @param int $persons  Количество персон
     * @param string $wish  Пожелания
     * @param string $mode  Источник обращения
     * @return array Массив сообщения
     */
    public static function BuildMessageOfBooking(
        string $guest_name,
        string $guest_phone,
        string $date,
        string $time,
        int $persons,
        string $mode = 'site',
        string $wish = null
    ): array
    {
        $users = [['telegram'=>5693145164,'silent'=>false],['telegram'=>6170727678,'silent'=>false],['telegram'=>822173207,'silent'=>false],['telegram'=>5598318350,'silent'=>false]];
        $users = (object) $users;
        $addon='';
        if (!is_null($wish)){
            $addon.=PHP_EOL.'<i>Пожелания гостя: </i>'.'<b>'.$wish.'</b>';
        }
        if ($mode == 'site'){
            $addon.=PHP_EOL.'<b>ТРЕБУЕТСЯ ПОДТВЕРЖДЕНИЕ! СВЯЖИТЕСЬ С ГОСТЕМ!</b>';
        }
        $text = '<b>Бронирование</b>'.PHP_EOL.'Гость: <b>'.$guest_name.'</b>'.PHP_EOL.
            'Телефон: <b>+' .  preg_replace( '/[^0-9]/', '', $guest_phone ) . '</b>'.PHP_EOL.
            'Количество персон: <b>' . $persons . '</b>'.PHP_EOL.
            'Дата и время: <b>' . date('d-m-Y',strtotime($date)).'   '. $time . '</b>';
        $text.=$addon;
        $result = [];
        foreach ($users as $user)
            $result[] = [
                'fields'=>[
                    'chat_id' => $user['telegram'],
                    'text' => $text,
                    'parse_mode' => 'html',
                    'reply_markup'=>json_encode([
                        'inline_keyboard'=>
                            [
                                [
                                    ['text'=>'Написать в WhatsApp','url'=>'https://wa.me/'.  preg_replace( '/[^0-9]/', '', $guest_phone )]
                                ],
                                [
                                    ['text'=>'Написать в Telegram','url'=>'https://t.me/+' .  preg_replace( '/[^0-9]/', '', $guest_phone )]
                                ]
                            ]
                    ]),
                    'disable_web_page_preview' => true,
                    'disable_notification' => $user['silent']
                ],
            ];
        return $result;
    }

    public static function BuildMessageINFO(
        string $guest_name,
        string $guest_phone,
        string $subject,
        string $message,
        string $mode = 'site'
    ): array
    {
        $users = [['telegram'=>1272846173,'silent'=>false],
            ['telegram'=>822173207,'silent'=>false],['telegram'=>5598318350,'silent'=>false]];
        $users = (object) $users;
        $text = '<b>Нам задали вопрос на сайте</b>'.PHP_EOL.'Имя : <b>'.$guest_name.'</b>'.PHP_EOL.
            'Телефон: <b>+' .  preg_replace( '/[^0-9]/', '', $guest_phone ) . '</b>'.PHP_EOL.
            'Тема сообщения: <b>' . $subject . '</b>'.PHP_EOL.
            '<b>Сообщение:</b> ' . PHP_EOL.$message;
        $result = [];
        foreach ($users as $user)
            $result[] = [
                'fields'=>[
                    'chat_id' => $user['telegram'],
                    'text' => $text,
                    'reply_markup'=>json_encode([
                        'inline_keyboard'=>
                            [
                                [
                                    ['text'=>'Написать в WhatsApp','url'=>'https://wa.me/'.  preg_replace( '/[^0-9]/', '', $guest_phone )]
                                ],
                                [
                                    ['text'=>'Написать в Telegram','url'=>'https://t.me/+' .  preg_replace( '/[^0-9]/', '', $guest_phone )]
                                ]
                            ]
                    ]),
                    'parse_mode' => 'html',
                    'disable_web_page_preview' => true,
                    'disable_notification' => $user['silent']
                ],
            ];
        return $result;
    }
}