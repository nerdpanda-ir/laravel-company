<?php namespace Tests ; ?>
<?php

use Illuminate\Testing\TestResponse;

class NoPrefixableRouteTestCase extends RouteTestCase {

    protected function getRequestToPageRouteByRouteName(
        array $routeParameters = [] , array $headers = []
    ):TestResponse {
        return $this->get(
            route( $this->pageRoute() , $routeParameters ) ,
            $headers
        );
    }

    protected function assertOkPageRouteGetResponseThatReceivedViaRouteName(
        array $routeParameters = [] , array $headers = [] ,
    ):void {
        $testResponse = $this->getRequestToPageRouteByRouteName( $routeParameters , $headers );
        $testResponse->assertOk();
    }

}
