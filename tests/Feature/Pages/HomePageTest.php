<?php

namespace Tests\Feature\Pages;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HomePageTest extends TestCase
{
    protected string $pageRoute = 'home' ;

    public function test_home_page_should_have_200_status_code() :void {
        $response = $this->get(route($this->pageRoute));
        $response->assertOk();
    }
    public function test_has_contentType_header():void {
        $url = route($this->pageRoute);
        $response = $this->get($url);
        $header = 'content-type';
        $isExist = $response->headers->has($header);
        $this->assertTrue($isExist,"get response for $url should have $header header !!!");
    }
    public function test_value_for_content_type_header_in_home_page_response_should_is_text_html():void {
        $url = route($this->pageRoute);
        $response = $this->get($url);
        $header = 'content-type';
        if (!$response->headers->has($header))
            $this->fail("no found $header header in " . $url . ' response !!!');
        $contentType = $response->headers->get($header);
        $expect = 'text/html';
        $this->assertTrue(
            str_contains($contentType, $expect),
            "in $header header value for $url url should exist  $expect but is $contentType"
        );

    }

    public function test_home_page_should_rendered_index_view() :void {
        $response = $this->get(route($this->pageRoute));
        $response->assertViewIs('index');
    }
}
