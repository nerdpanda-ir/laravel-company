<?php

namespace Tests\Feature\Pages;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\PageWithPrefixTestCase as TestCase ;

class BlogPageTest extends TestCase
{
    protected string $pageRoutePrefix = 'blog.';
    protected string $pageRoute = 'index';
    public function test_blogPage_should_have_200_status_code():void {
        /* @todo i can merge to one method !!! */
        $testResponse = $this->getRequestToFullPageRouteByRouteName();
        $testResponse->assertStatus(200);
    }
}
