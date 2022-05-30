<?php

namespace App\Http\Controllers\Api\V1;

use App\Contracts\HomePageApiControllerInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\Api\V1\Pages\HomePageResource;
use Illuminate\Http\Resources\Json\JsonResource;

class HomePageApiController extends Controller implements HomePageApiControllerInterface
{
    public function __invoke() :JsonResource {
        $data = [
            'message' => 'welcome to home'
        ];
        return HomePageResource::make($data);
    }
}
