<?php namespace Tests ; ?>
<?php

use Illuminate\Testing\TestResponse;

class PrefixableRouteTestCase extends RouteTestCase {
    protected string $pageRoutePrefix;

    protected function pageRoutePrefix() :string {
        return $this->pageRoutePrefix;
    }

    protected function pageRouteGenerateWithPrefix(string $pageRoute):string {
        return $this->pageRoutePrefix.$pageRoute;
    }

    protected function pageRouteWithPrefix():string {
        return $this->pageRouteGenerateWithPrefix($this->pageRoute);
    }

    /**
     * this method send get request to pageRoutePrefix +  page route by route name !!!!
     * @param array $routeParameters
     * @param array $headers
     * @return TestResponse
     */
    protected function getRequestToFullPageRouteByRouteName(
        array $routeParameters = [] , array $headers = [] ,
    ):TestResponse {
        return $this->get(
            route($this->pageRouteWithPrefix(), $routeParameters ) ,
            $headers
        );
    }

    protected function assertOkFullPageRouteGetResponseThatReceivedByRouteName(
        array $routeParameters = [] ,  array $headers = [] ,
    ):void {
        $testResponse = $this->getRequestToFullPageRouteByRouteName($routeParameters,$headers);
        $testResponse->assertOk();
    }

    protected function assertValueForHeaderInReceivedResponseFromGetRequestToFullPageRouteByRouteNameEqualTo(
        string $header , string $value , array $routeParameters = [] , array $headers = []
    ):void {
        $testResponse = $this->getRequestToFullPageRouteByRouteName($routeParameters , $headers) ;
        $this->assertHeaderValueInResponseEqualTo($testResponse , $header , $value);
    }

    protected function
     assertValueForContentTypeHeaderInReceivedResponseFromGetRequestToFullPageRouteByRouteNameEqualTo(
        string $expected , array $routeParameters = [] , array $headers = [] ,
    ):void {
        $testResponse = $this->getRequestToFullPageRouteByRouteName( $routeParameters , $headers);
        $this->assertValueForContentTypeHeaderEqualTo($testResponse , $expected );
    }
}
