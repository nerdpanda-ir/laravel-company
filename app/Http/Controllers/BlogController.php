<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;

class BlogController extends Controller
{
    public function __invoke():View {
        $data = [
            'language'=>'en'
        ];
        return \view('blog');
    }
}
