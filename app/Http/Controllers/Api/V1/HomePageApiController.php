<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\Api\V1\Pages\HomePageResource;
use Illuminate\Http\Resources\Json\JsonResource;

class HomePageApiController extends Controller
{
    public function __invoke() :JsonResource {
        $data = [
            'messsage' => 'welcome to home page !!! '
        ];
        return HomePageResource::make($data);
    }
}
