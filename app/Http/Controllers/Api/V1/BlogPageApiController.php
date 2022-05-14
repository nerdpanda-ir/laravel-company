<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\V1\Pages\BlogPageResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BlogPageApiController extends Controller
{
    public function __invoke():JsonResource {
        $data = [
            'message' => 'welcome to blog page !!!'
        ];
        return BlogPageResource::make($data);
    }
}
