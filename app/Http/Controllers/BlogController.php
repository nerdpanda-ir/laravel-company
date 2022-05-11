<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;

class BlogController extends Controller
{
    public function index():View {
        $data = ['language'=>'en' , 'charset'=>'utf88888'];
        return \view('blog',$data);
    }
}
