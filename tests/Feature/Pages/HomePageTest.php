<?php

namespace Tests\Feature\Pages;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Testing\TestResponse;

class HomePageTest extends TestCase
{
    public function test_home_page_should_have_200_status_code() :void {
        /** @var TestResponse $testResponse*/
        $testResponse = $this->get(
            route('home')
        );
        $testResponse->assertStatus(200);
    }
}
