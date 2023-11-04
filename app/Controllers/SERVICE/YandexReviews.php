<?php

namespace App\Controllers\SERVICE;

use App\Controllers\BaseController;

class YandexReviews extends BaseController
{
    public function index(){

        $data = self::getReviews();
        echo '<pre>'; print_r($data); echo '</pre>';
    }
    public static function getReviews()
    {

        $return['ratingData'] = self::getRatingData(176559255156);
        $return['ratingData']['ratingValue'] = round($return['ratingData']['ratingValue'],1,PHP_ROUND_HALF_DOWN);
        $result = self::apiReviews(176559255156);

        foreach($result['view']['views'] AS $key => $item)
        {
            if (!isset($item['type']) || $item['type'] != '/ugc/review' ) continue;
            if($item['rating']['val'] > 3) {
                $reviews[$key]['fio'] = $item['author']['name'];
                $reviews[$key]['pic'] = strlen($item['author']['pic']) ? 'https://avatars.mds.yandex.net/get-yapic/' . $item['author']['pic'] . '/islands-retina-middle' : '';
                $reviews[$key]['professionLevelNum'] = $item['author']['professionLevelNum'];
                $reviews[$key]['text'] = $item['text'];
                $reviews[$key]['rating'] = $item['rating']['val'];

               /* $reviews[$key]['date'] = date('d', $item['time'] / 1000) . ' ' . self::getMonth(date('m', $item['time'] / 1000))
                    . (date('Y', $item['time'] / 1000) != date('Y') ? ' ' . date('Y', $item['time'] / 1000) : '');*/
            }
        }
        $return['reviews'] = $reviews;



        return $return;
    }

    private static function getRatingData($id)
    {
        $url = 'https://yandex.ru/profile/'.$id;
        $headers = [
            'accept: application/json, text/plain, */*',
            'accept-language: ru,en;q=0.9,en-GB;q=0.8,en-US;q=0.7',
            'sec-ch-ua: "Chromium";v="112", "Microsoft Edge";v="112", "Not:A-Brand";v="99"',
            'sec-ch-ua-mobile: ?0',
            'sec-ch-ua-platform: "Windows"',
            'sec-fetch-dest: empty',
            'sec-fetch-mode: cors',
            'sec-fetch-site: same-origin',
            'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/112.0.0.0 Safari/537.36 Edg/112.0.1722.39'
        ];

        $cookie = __DIR__.'/ycookie.txt';

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie);
        curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie);
        $result = curl_exec($ch);
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        if ($http_code != 200) {
            return false;
        }
        preg_match_all('/"(ratingData)":{(?<value>.[^}]+)(})/s',$result,$matches);
        $json = $matches['value'][0];
        $result = json_decode('{'.$json.'}',true);
        return $result;
    }

    private static function apiReviews($id)
    {
        $url = 'https://yandex.ru/ugcpub/digest?offset=0&objectId=%2Forg%2F'.$id.'&ranking=by_time&addComments=true&otype=Org&appId=1org-viewer&add_geosearch_snippets=true&limit=999';
        $headers = [
            'accept: application/json, text/plain, */*',
            'accept-language: ru,en;q=0.9,en-GB;q=0.8,en-US;q=0.7',
            'sec-ch-ua: "Chromium";v="112", "Microsoft Edge";v="112", "Not:A-Brand";v="99"',
            'sec-ch-ua-mobile: ?0',
            'sec-ch-ua-platform: "Windows"',
            'sec-fetch-dest: empty',
            'sec-fetch-mode: cors',
            'sec-fetch-site: same-origin',
            'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/112.0.0.0 Safari/537.36 Edg/112.0.1722.39'
        ];

        $cookie = __DIR__.'/ycookie.txt';
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie);
        curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie);
        $result = curl_exec($ch);
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        if ($http_code != 200) {
            return false;
        }
        $result = json_decode($result,true);
        return $result;
    }

    private function getMonth($month)
    {
        $months = [
            '01' => 'января',
            '02' => 'февраля',
            '03' => 'марта',
            '04' => 'апреля',
            '05' => 'мая',
            '06' => 'июня',
            '07' => 'июля',
            '08' => 'августа',
            '09' => 'сентября',
            '10' => 'октября',
            '11' => 'ноября',
            '12' => 'декабря',
        ];
        return $months[$month];
    }
}
