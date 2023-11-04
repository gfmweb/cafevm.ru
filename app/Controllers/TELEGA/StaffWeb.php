<?php

namespace App\Controllers\TELEGA;

use App\Controllers\BaseController;
use CodeIgniter\API\ResponseTrait;

class StaffWeb extends BaseController
{
    use ResponseTrait;
    public function index()
    {
        return view('telega/web');
    }

    public function getDiskont()
    {
        require_once APPPATH.'/ThirdParty/phpqrcode/qrlib.php';
        $staff = $this->request->getVar('staff');
        $summa = $this->request->getVar('summa');
        $proc = $this->request->getVar('proc');
        $name = time();
        $buildBonus=floor((int)($summa / 100)*(int)$proc);
        $id = password_hash(time(),PASSWORD_DEFAULT);
        $summa = number_format((int)$summa, 0, '', ' ');
        $buildBonus = number_format((int)$buildBonus, 0, '', ' ');
        $img = \QRcode::png('https://cafevm.ru/lk?bonusId='.$id, $name.'.png','H',10);
        return $this->respond(['summa'=>$summa,'bonus'=>$buildBonus,'img'=>$name.'.png']);
    }
}
