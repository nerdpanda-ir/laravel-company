<?php

namespace App\Http\Controllers\Api\V1;

use App\Contracts\ShowArticlePageApiControllerContract;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ShowArticlePageApiController extends Controller implements ShowArticlePageApiControllerContract
{
    public function __invoke(): JsonResource {

    }
}
