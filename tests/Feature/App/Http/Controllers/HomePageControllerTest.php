<?php

namespace Tests\Feature\App\Http\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\SingleActionControllerTestCase;
use App\Http\Controllers\HomeController ;
use Illuminate\Contracts\View\View;
class HomePageControllerTest extends SingleActionControllerTestCase
{
    protected string $namespace = HomeController::class ;
}
