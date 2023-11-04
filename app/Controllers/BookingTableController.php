<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Controllers\TELEGA\TelegramController;
use App\Helpers\BuildMessage;
use CodeIgniter\API\ResponseTrait;

class BookingTableController extends BaseController
{
    use ResponseTrait;
    public function siteBooking()
    {
        $name       = $this->request->getVar('name');
        $phone      = $this->request->getVar('phone');
        $date       = $this->request->getVar('date');
        $time       = $this->request->getVar('time');
        $persons    = $this->request->getVar('persons');
        $wish       = $this->request->getVar('wish');
        $mode       = $this->request->getVar('mode');

        $message = BuildMessage::BuildMessageOfBooking($name,$phone,$date,$time,$persons,$mode,$wish);
        $Telegram = new TelegramController();
        $result =  $Telegram->send('new_booking','sendMessage',$message);
       return $this->respond('success');
    }
}
