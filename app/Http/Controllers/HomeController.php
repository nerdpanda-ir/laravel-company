<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contracts\HomeControllerInterface;
use Illuminate\Contracts\View\View;

class HomeController extends Controller implements HomeControllerInterface
{
    public function __invoke() :View {
        $data = [
            'language'=>'fa' ,
            'charset'=> 'UTF8' ,
        ];
        return \view('index',$data);
    }
}
