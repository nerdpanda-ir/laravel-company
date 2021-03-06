<?php

namespace App\Http\Controllers\Api\V1;

use App\Contracts\HomePageApiControllerContract;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\Api\V1\Pages\HomePageResource;
use Illuminate\Http\Resources\Json\JsonResource;

class HomePageApiController extends Controller implements HomePageApiControllerContract
{
    public function __invoke() :JsonResource {
        $data = [
            'message' => 'welcome to home'
        ];
        return HomePageResource::make($data);
    }
}
