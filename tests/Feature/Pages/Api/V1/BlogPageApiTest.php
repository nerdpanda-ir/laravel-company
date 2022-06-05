<?php

namespace Tests\Feature\Pages\Api\V1;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BlogPageApiTest extends TestCase
{
    protected string $pageRoute = 'api.v1.page.blog';

    public function test_should_have_200_status_code():void {
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
    public function test_content_type_header_in_response_should_is_application_json():void {
        $url = route($this->pageRoute);
        $response = $this->get($url);
        $header = 'content-type';
        if (!$response->headers->has($header))
            $this->fail("no found $header header in " . $url . ' response !!!');
        $contentType = $response->headers->get($header);
        $expect = 'application/json';
        $this->assertTrue(
            str_contains($contentType, $expect),
            "in $header header value for $url url should exist  $expect but is $contentType"
        );
    }

    public function test_json_response_body():void {
        $expected = ['data'=> ['message'=>'welcome to blog page !!!']];
        $response = $this->get(route($this->pageRoute));
        $response->assertJson($expected);
    }
}
