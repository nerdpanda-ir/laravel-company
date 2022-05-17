<?php namespace Tests ; ?>
<?php
class NoPrefixableJsonRouteTestCase extends NoPrefixableRouteTestCase {
    use JsonableRoute;

    protected function assertValueForContentTypeHeaderInReceivedResponseFromGetRequestToPageRouteByRouteNameEqualToApplicationJson(
        array $routeParameters = [] , array $headers = [] ,
    ):void {
        $testResponse = $this->getRequestToPageRouteByRouteName($routeParameters , $headers );
        $this->assertValueForContentTypeHeaderInResponseEqualToApplicationJson($testResponse);
    }
}
