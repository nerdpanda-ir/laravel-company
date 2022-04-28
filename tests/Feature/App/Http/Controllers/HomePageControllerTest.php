<?php

namespace Tests\Feature\App\Http\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\SingleActionControllerTestCase;
use App\Http\Controllers\HomeController ;

class HomePageControllerTest extends ControllerTestCase
{
    protected string $namespace = HomeController::class ;
}
