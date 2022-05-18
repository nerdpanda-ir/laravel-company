<?php

namespace Tests\Feature\App\Http\Controllers\Api\V1;

use App\Http\Resources\Api\V1\Pages\BlogPageResource;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Resources\Json\JsonResource;
use Tests\SingleActionControllerTestCase as TestCase ;
use App\Http\Controllers\Api\V1\BlogPageApiController ;

class BlogPageApiControllerTest extends TestCase
{
    protected string $namespace = BlogPageApiController::class ;
    public function test_invoke_method_should_return_instance_of_JsonResource():void {
        $this->assertInvokeMethodReturnJsonResourceInstance();
    }

    public function test_invoke_method_should_return_instance_of_BlogPageResource():void{
        $this->assertInvokeMethodReturnInstanceOf(BlogPageResource::class);
    }
}
