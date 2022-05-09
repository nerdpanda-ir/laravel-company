<?php namespace Tests ; ?>
<?php
use Illuminate\Testing\TestResponse;
use Tests\TestCase ;

class PageTestCase extends TestCase {
    protected string $pageRoute;

    protected function pageRoute():string {
        return $this->pageRoute;
    }

    protected function sendGetRequestToPageRouteByRouteName(
        array $routeParameters = [] ,
        array $headers = []
    ):TestResponse {
        return $this->get(
            route( $this->pageRoute() , $routeParameters ) ,
            $headers
        );
    }

}
