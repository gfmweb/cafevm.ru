<?php

namespace App\Controllers;

use App\Controllers\SERVICE\YandexReviews;
use App\Models\TopBarModel;
use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseTrait;

class Home extends BaseController
{

    use \CodeIgniter\API\ResponseTrait;
    public function index()
    {
        $topBar = new TopBarModel();
        return view('welcome_message',
            [
                'top'=>[],//$topBar->findAll()
                'reviews'=>YandexReviews::getReviews()
            ]);
    }

    public function lk()
    {
        return view('lk');
    }

    public function register()
    {
        $name = $this->request->getVar('name');
        $phone = $this->request->getVar('phone');
        $phone = preg_replace( '/[^0-9]/', '', $phone );
        $birthday = $this->request->getVar('birthday');
        $hash = password_hash(time(),PASSWORD_DEFAULT);
        $hash.=rand(1,10000);
        $UserModel = new UserModel();
        $UserModel->storeUser($name,$phone,$birthday,$hash);
        return $this->respond(['data'=>$hash,'birthday'=>$birthday]);

    }

    public function getInfo()
    {
        $hash = $this->request->getVar('hash');
        $User=new UserModel();
        $current =  $User->getInfo($hash);
        if (isset($current->id)) {
            $actions = json_decode($current->actions,true);
            $actions['start']=date('d-m-Y',strtotime($actions['start']));
            $actions['end']=date('d-m-Y',strtotime($actions['end']));
            $apser = false;
            if(strtotime($actions['end']) < time()){
                $apser = true;
            }
            return $this->respond(['data' =>
                ['name'=>$current->name,
                    'actions'=>$actions,
                    'apser'=>$apser
                    ]]);
        }
        else{
            return $this->respond(['data'=>['name'=>'superErr']]);
        }
    }

    public function getUserQr()
    {
        require_once APPPATH.'/ThirdParty/phpqrcode/qrlib.php';
        $hash = $this->request->getVar('user');
        $UserModel = new UserModel();
        $current = $UserModel->getInfoQR($hash);
        $currentDate = time();
        $current->actions = json_decode($current->actions,true);
        $end = strtotime($current->actions['end']. ' 23:59:59');

        if($currentDate < $end && $current->actions['end']!==null && $current->actions['start']!==null){

            $img = \QRcode::png('https://cafevm.ru/admin/lk/check?user='.urlencode($current->name).
                '&date='.date('d-m-Y H:i:s').'&file=User_QR_'.$current->id.$currentDate.'.png',
                './User_QR_'.$current->id.$currentDate.'.png',true,'H',10);
              $redis = new \Redis();
              $redis->connect('127.0.0.1',6379);
              $redis->select(6);
              $redis->set($current->id.$currentDate,true,30);
            $list = glob('User_QR*.png');

            $cur = date("d");
            foreach ($list as $el)
            {
                if (file_exists($el))
                {
                    $da = date("d", filectime($el));
                    if($da!==$cur){
                        unlink($el);
                    }
                }
            }
            return $this->respond(['link'=>'https://cafevm.ru/User_QR_'.$current->id.$currentDate.'.png']);
        }
        else{

        }
    }
}
