<?php

namespace Tests\Feature\App\Http\Controllers\Api\V1;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\SingleActionControllerTestCase as TestCase;
use App\Http\Controllers\Api\V1\HomePageApiController;
use Illuminate\Http\Resources\Json\JsonResource ;

class HomePageApiControllerTest extends TestCase
{
    protected string $namespace = HomePageApiController::class ;

    public function test_invoke_method_should_return_JsonResource_object():void {
        $controller = $this->app->make($this->namespace);
        $invokeResult = $this->app->call([$controller,'__invoke']);
        $this->assertInstanceOf(JsonResource::class , $invokeResult);
    }
}
