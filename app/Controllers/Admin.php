<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Controllers\TELEGA\TelegramController;
use App\Models\StaffModel;
use App\Models\UserModel;

class Admin extends BaseController
{
    public function index()
    {
       $clientsModel = new UserModel();
       $admins = new StaffModel();
       $admin = $admins->find($this->session->get('staff_id'));
       $array = $clientsModel->orderBy('updated_at','DESC')->findAll();
       for ($i=0,$iMax=count($array); $i<$iMax; $i++)
       {
           $array[$i]->actions = json_decode($array[$i]->actions,true);
       }
       return view('staff',['clients'=>$array,'admin'=>$admin]);
    }

    public function logOut()
    {
        $this->session->destroy();
        return redirect()->to('/admin/lk');
    }


    public function login_view()
    {
        return view('admin_login');
    }

    public function login()
    {
        $name=trim($this->request->getVar('login'));
        $password = trim($this->request->getVar('password'));
        $userModel = new StaffModel();
        $user = $userModel->where('name',$name)->first();
        if(!isset($user->id)||!password_verify($password,$user->password)){
            return redirect()->to('/admin/login');
        }

        $this->session->set('can_admin',true);
        $this->session->set('staff_name',$user->name);
        $this->session->set('staff_id',$user->id);
       return redirect()->to('/admin/lk');
    }

    public function startAction()
    {
        $userid = $this->request->getVar('id');
        $users = new UserModel();
        $user = $users->find($userid);
        $user->actions = json_decode($user->actions);
        $user->actions->start = date('Y-m-d');
        $user->actions->end = date('Y-m-d',strtotime('+ 1 month'));
        $user->actions = json_encode($user->actions);
        $users->update($userid,['actions'=>$user->actions]);
        $Telegram = new TelegramController();
        $Telegram->sendOwner($user->name,$user->phone,$this->session->get('staff_name'));
        return redirect()->to('/admin/lk');
    }

    public function check()
    {
        $date = $this->request->getVar('date');
        $file = $this->request->getVar('file');
        $user = $this->request->getVar('user');
        $list = glob('User_QR*.png');
        foreach ($list as $el)
        {
            if (file_exists($el))
            {
               $da = date("d", filectime($el));
               $cur = date("d");
               if($da!==$cur){
                   unlink($el);
               }
            }
        }
        $time = time();
        $filetime = strtotime($date);
        $timeflag = true;
        if($filetime + 10 < $time){
            $timeflag = false;
        }
        if(!file_exists($file)){
            $fileflag = false;
        }
        else {
            $fileflag = true;
            unlink($file);
        }
        return view('check',['user'=>$user,'time'=>$timeflag,'file'=>$fileflag]);


    }

    public function changePassword()
    {
        $password = trim($this->request->getVar('password'));
        $repassword = trim($this->request->getVar('repassword'));
        if($password === $repassword)
        {
            $admins = new StaffModel();
            $admins->update($this->session->get('staff_id'),[
                'password'=>password_hash($password,PASSWORD_DEFAULT),
                'must_change'=>0
            ]);
            $this->session->destroy();

        }
        return redirect()->to('/admin/lk');
    }
}

