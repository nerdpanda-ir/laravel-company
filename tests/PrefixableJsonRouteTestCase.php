<?php namespace Tests; ?>
<?php
class PrefixableJsonRouteTestCase extends PrefixableRouteTestCase {
    use JsonableRoute;

    protected function assertValueForContentTypeHeaderInReceivedGetResponseFromRequestToFullPageRouteByRouteNameEqualToApplicationJson(
        array $routeParameters = [] , array $headers = [] ,
    ):void {
        $testResponse = $this->getRequestToFullPageRouteByRouteName($routeParameters , $headers );
        $this->assertValueForContentTypeHeaderInResponseEqualToApplicationJson($testResponse);
    }

    protected function assertReceivedJsonResponseFromGetRequestToFullPageRouteByRouteNameEqualTo(
        array | callable $expected , bool $strict = false ,
        array $routeParameters = [] , array $headers = []
    ):void {
        $testResponse = $this->getRequestToFullPageRouteByRouteName( $routeParameters , $headers );
        $this->assertJsonInResponseEqualTo($testResponse,$expected,$strict);
    }
}
