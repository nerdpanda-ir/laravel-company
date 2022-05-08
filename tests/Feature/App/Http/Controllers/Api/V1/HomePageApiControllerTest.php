<?php

namespace Tests\Feature\App\Http\Controllers\Api\V1;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\SingleActionControllerTestCase as TestCase;
use App\Http\Controllers\Api\V1\HomePageApiController;

class HomePageApiControllerTest extends TestCase
{
    protected string $namespace = HomePageApiController::class ;
}
