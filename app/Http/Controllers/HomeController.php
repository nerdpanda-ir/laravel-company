<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;

class HomeController extends Controller
{
    public function __invoke() :View {
        $data = [
            'language'=>'fa' ,
            'charset'=> 'UTF8' ,
        ];
        return \view('index',$data);
    }
}
