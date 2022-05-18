<?php

namespace Tests\Feature\Pages\Api\V1;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\ApiV1PagesRouteTestCase as TestCase;

class BlogPageApiTest extends TestCase
{
    protected string $pageRoute = 'blog';

    public function test_should_blog_api_page_have_200_status_code():void {
        $this->assertOkFullPageRouteGetResponseThatReceivedByRouteName();
    }

    public function test_content_type_header_in_blog_page_api_response_should_is_application_json():void {
$this->assertValueForContentTypeHeaderInReceivedGetResponseFromRequestToFullPageRouteByRouteNameEqualToApplicationJson();
    }

    public function test_blog_api_page_response_content_test():void {
        $expected = ['data'=> ['message'=>'welcome to blog page !!!']];
        $this->assertReceivedJsonResponseFromGetRequestToFullPageRouteByRouteNameEqualTo($expected);
    }
}
