<?php

namespace Tests\Feature\App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\SingleActionControllerTestCase as TestCase ;
use App\Http\Controllers\BlogController;

class BlogControllerTest extends TestCase {
    protected string $namespace = BlogController::class ;
    public function test_invoke_method_should_return_instance_of_View() :void {
        /** @todo create method in controller test case -> for method should return instance of view !!! */
        /** @todo create method in single action controller test case -> invoke method should return instance of view !!! */
        $this->assertInvokeMethodReturnInstanceOf(View::class);
    }
}
