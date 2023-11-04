<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ActionModel;

class ActionsController extends BaseController
{
    public function index()
    {
        $Actions  = new ActionModel();
        $title = env('APP_NAME') . ' Акции и Бонусы';
        $actions = $Actions->getActiveReadyRegister();
        return view('actions',['title'=>$title,'actions'=>$actions]);

    }
    public function reception()
    {
        $url = $this->request->getUri();
        echo '<pre>'; print_r($url->getSegments()); echo '</pre>';
        return 'this is reception';
    }
}
