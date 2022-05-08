<?php

namespace Tests\Feature\Pages\Api\V1;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\ApiV1PageTestCase as TestCase;

class HomePageApiTest extends TestCase
{
    protected string $pageRoute = 'home';

    public function test_home_api_page_should_have_200_status_code():void {
        $testResponse = $this->get(
            route($this->pageRouteWithPrefix())
        );
        $testResponse->assertStatus(200);
    }
}
