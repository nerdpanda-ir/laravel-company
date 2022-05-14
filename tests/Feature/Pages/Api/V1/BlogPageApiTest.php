<?php

namespace Tests\Feature\Pages\Api\V1;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\ApiV1PageTestCase as TestCase;

class BlogPageApiTest extends TestCase
{
    protected string $pageRoute = 'blog';

    public function test_should_blog_api_page_have_200_status_code():void {
        $this->assertOkFullPageRouteGetResponseThatReceivedByRouteName();
    }

    public function test_content_type_header_in_blog_page_api_response_should_is_application_json():void {
        /** @todo can merge this methods to one */
        /** @todo after merge => should refactor home page api test */
        $testResponse = $this->getRequestToFullPageRouteByRouteName();
        $testResponse->assertHeader('content-type','application/json');
    }


}
