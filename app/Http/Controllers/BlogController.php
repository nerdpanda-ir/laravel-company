<?php

namespace App\Http\Controllers;

use App\Contracts\BlogControllerContract ;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;

class BlogController extends Controller implements BlogControllerContract
{
    public function __invoke():View {
        $data = [
            'language'=> 'en' ,
            'charset' => 'blog charset just for fun !!! ',
            'bottomHeaderTitle'=> 'all articles' ,
            'bottomHeaderDescribe'=> 'list of the articles '
        ];
        return \view('blog', $data );
    }
}
