<?php

namespace App\Http\Controllers\Api\V1;

use App\Contracts\ArticleApiControllerContract;
use App\Http\Controllers\Controller;
use App\Http\Resources\Api\V1\ArticleResourceCollection;
use App\Http\Resources\Api\V1\ShowArticleResource;
use Illuminate\Http\Resources\Json\JsonResource;

class ArticleApiController extends Controller implements ArticleApiControllerContract
{
    public function index(): JsonResource {
        $data = ['message'=>'all articles'];
        return ArticleResourceCollection::make($data);
    }
    public function show(): JsonResource {
        $data = ['message'=>'article detail !!!'];
        return ShowArticleResource::make($data);
    }
}
