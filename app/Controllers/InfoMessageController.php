<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Controllers\TELEGA\TelegramController;
use App\Helpers\BuildMessage;
use CodeIgniter\API\ResponseTrait;

class InfoMessageController extends BaseController
{
    use ResponseTrait;
    public function siteMessage()
    {
        $name       = $this->request->getVar('name');
        $phone      = $this->request->getVar('phone');
        $subject       = $this->request->getVar('subject');
        $message       = $this->request->getVar('message');
        $mode       = $this->request->getVar('mode');

        $message = BuildMessage::BuildMessageINFO($name,$phone,$subject,$message,$mode);
        $Telegram = new TelegramController();
        $result =  $Telegram->send('new_infoMessage','sendMessage',$message);
        return $this->respond('success');
    }
}
