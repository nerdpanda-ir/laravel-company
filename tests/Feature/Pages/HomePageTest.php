<?php

namespace Tests\Feature\Pages;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Testing\TestResponse;

class HomePageTest extends TestCase
{
    public function test_home_page_should_have_200_status_code() :void {
        $testResponse = $this->get(
            route('home')
        );
        $testResponse->assertStatus(200);
    }

    public function test_home_page_should_rendered_index_view() :void {
        $testResponse = $this->get(
            route('home')
        );
        $testResponse->assertViewIs('index');
    }
}
