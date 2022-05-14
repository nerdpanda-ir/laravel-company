<?php

namespace Tests\Feature\App\Http\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\SingleActionControllerTestCase as TestCase;
use App\Http\Controllers\HomeController ;
use Illuminate\Contracts\View\View;

class HomePageControllerTest extends TestCase
{
    protected string $namespace = HomeController::class ;
    public function test_invoke_method_should_return_view():void {
        $this->assertInvokeMethodReturnViewInstance();
    }
}
