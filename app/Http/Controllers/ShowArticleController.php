<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use App\Contracts\ShowArticleControllerInterface;

class ShowArticleController extends Controller implements ShowArticleControllerInterface
{
    public function __invoke():View {
        $data = ['language'=>'utffff','charset'=>'utf8'];
        return \view('blog-details',$data);
    }
}
