<?php

namespace App\Http\Controllers;

use App\Contracts\ShowArticleControllerContract;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ShowArticleController extends Controller implements ShowArticleControllerContract
{
    public function __invoke():View {
        $data = [
            'language'=>'utffff',
            'charset'=>'utf8' ,
            'bottomHeaderTitle'=> 'show article' ,
            'bottomHeaderDescribe'=> 'article details !!!'
        ];
        return \view('blog-details',$data);
    }
}
