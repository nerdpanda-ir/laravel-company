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
        $this->assertInvokeMethodReturnViewInstance();
    }

    public function test_invoke_method_should_return_blog_view():void {
        /** @todo should create this method for home controller !!! */
        /* @todo create method in Controller test -> view name check for  methods !!!  */
        /* @todo create method in single Action Test Case -> view name check for invoke methods !!!  */
        /** @var View $invokeResult*/
        $invokeResult = $this->callInvoke() ;
        $actual = $invokeResult->name() ;
        $expected = 'blog';
        $this->assertEquals($expected , $actual , "invoke method should return {$expected} view ");
    }
}
