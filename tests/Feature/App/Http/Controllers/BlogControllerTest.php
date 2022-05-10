<?php

namespace Tests\Feature\App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\ControllerTestCase as TestCase ;
use App\Http\Controllers\BlogController;

class BlogControllerTest extends TestCase {
    protected string $namespace = BlogController::class ;
    public function test_index_method_should_exist():void {
        $this->assertControllerHasMethod('index');
    }
    public function test_index_method_should_return_instance_of_View() :void {
        /** @todo create global call */
        /** @todo assert return instance -> for all methods !!! */
        $controller = $this->controllerInstance();
        $indexResult = $this->app->call([$controller,'index']);
        $this->assertInstanceOf(View::class,$indexResult);
    }
}
