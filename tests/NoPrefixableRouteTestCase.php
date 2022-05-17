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

    protected function assertValueForHeaderInReceivedResponseFromGetRequestToPageRouteByRouteNameEqualTo(
        string $header , string $value , array $routeParameter = [] , array $headers = []
    ):void {
        $testResponse = $this->getRequestToPageRouteByRouteName($routeParameter,$headers);
        $this->assertHeaderValueInResponseEqualTo($testResponse,$header,$value);
    }

    protected function assertValueForContentTypeHeaderInReceivedResponseFromGetRequestToPageRouteByRouteNameEqualTo(
        string $expected , array $routeParameters = [] , array $headers = []
    ):void {
        $testResponse = $this->getRequestToPageRouteByRouteName($routeParameters,$headers);
        $this->assertValueForContentTypeHeaderEqualTo( $testResponse , $expected );
    }
}
