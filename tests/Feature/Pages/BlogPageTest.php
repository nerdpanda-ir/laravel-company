<?php

namespace Tests\Feature\Pages;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\PageTestCase as TestCase ;

class BlogPageTest extends TestCase
{
    protected string $pageRoute = 'blog';
//    public function test_blogPage_should_have_200_status_code():void {
//        /** @todo review all test class for apply this assertion methods !!!! */
//        $this->assertOkFullPageRouteGetResponseThatReceivedByRouteName();
//    }

    public function test_blog_page_should_have_200_status_code():void {
        $this->assertOkPageRouteGetResponseThatReceivedViaRouteName();
    }

    public function test_blog_page_should_rendered_blog_view():void {
        $testResponse = $this->getRequestToPageRouteByRouteName() ;
        $testResponse->assertViewIs('blog');
    }
//    public function test_blogPage_should_rendered_blogView():void {
//        /** @todo maybe merge to one method !!!*/
//        $testResponse = $this->getRequestToFullPageRouteByRouteName();
//        $testResponse->assertViewIs('blog');
//    }
}
