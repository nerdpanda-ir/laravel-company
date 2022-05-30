<?php

namespace App\Http\Controllers;

use App\Contracts\BlogControllerInterface;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;

class BlogController extends Controller implements BlogControllerInterface
{
    public function __invoke():View {
        $data = [
            'language'=> 'en' ,
            'charset' => 'blog charset just for fun !!! ',
        ];
        return \view('blog', $data );
    }
}
