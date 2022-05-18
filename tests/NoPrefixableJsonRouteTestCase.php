<?php namespace Tests ; ?>
<?php
class NoPrefixableJsonRouteTestCase extends NoPrefixableRouteTestCase {
    use JsonableRoute;

    protected function assertValueForContentTypeHeaderInReceivedGetResponseFromRequestToPageRouteByRouteNameEqualToApplicationJson(
        array $routeParameters = [] , array $headers = [] ,
    ):void {
        $testResponse = $this->getRequestToPageRouteByRouteName($routeParameters , $headers );
        $this->assertValueForContentTypeHeaderInResponseEqualToApplicationJson($testResponse);
    }

    protected function assertReceivedJsonResponseFromGetRequestToPageRouteByRouteNameEqualTo(
        array | callable $expected , bool $strict = false ,
        array $routeParameters = [] , array $headers = [] ,
    ):void {
        $testResponse = $this->getRequestToPageRouteByRouteName( $routeParameters , $headers );
        $this->assertJsonInResponseEqualTo( $testResponse , $expected , $strict );
    }
}
