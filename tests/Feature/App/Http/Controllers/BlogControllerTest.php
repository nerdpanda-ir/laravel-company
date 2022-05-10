<?php

namespace Tests\Feature\App\Http\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\ControllerTestCase as TestCase ;
use App\Http\Controllers\BlogController;

class BlogControllerTest extends TestCase {
    protected string $namespace = BlogController::class ;
    public function test_index_method_should_exist():void {
        $controller = $this->controllerInstance();
        $isExistIndex = method_exists($controller,'index');
        $this->assertTrue(
            $isExistIndex ,
            "in class {$this->namespace} should exist index method !!! "
        );
    }
}
