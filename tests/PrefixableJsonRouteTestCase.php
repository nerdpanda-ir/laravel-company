<?php namespace Tests; ?>
<?php
class PrefixableJsonRouteTestCase extends PrefixableRouteTestCase {
    use JsonableRoute;

    protected function assertValueForContentTypeHeaderInReceivedResponseFromGetRequestToFullPageRouteByRouteNameEqualToApplicationJson(
        array $routeParameters = [] , array $headers = [] ,
    ):void {
        $testResponse = $this->getRequestToFullPageRouteByRouteName($routeParameters , $headers );
        $this->assertValueForContentTypeHeaderInResponseEqualToApplicationJson($testResponse);
    }
}
