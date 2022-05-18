<?php

namespace Tests\Feature\Pages;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\NoPrefixableViewRouteTestCase as TestCase;

class HomePageTest extends TestCase
{
    protected string $pageRoute = 'home' ;

    public function test_home_page_should_have_200_status_code() :void {
        $this->assertOkPageRouteGetResponseThatReceivedViaRouteName();
    }

    public function test_home_page_should_rendered_index_view() :void {
        $testResponse = $this->getRequestToPageRouteByRouteName();
        $testResponse->assertViewIs('index');
    }
}
