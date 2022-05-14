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
}
