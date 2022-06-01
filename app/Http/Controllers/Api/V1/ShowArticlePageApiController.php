<?php

namespace App\Http\Controllers\Api\V1;

use App\Contracts\ShowArticlePageApiControllerContract;
use App\Http\Controllers\Controller;
use App\Http\Resources\Api\V1\Pages\ShowArticlePageResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ShowArticlePageApiController extends Controller implements ShowArticlePageApiControllerContract
{
    public function __invoke(): JsonResource {
        $data = ['message'=>'article details'];
        return ShowArticlePageResource::make($data);
    }
}
