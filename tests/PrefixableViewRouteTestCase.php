<?php namespace Tests ; ?>
<?php
class PrefixableViewRouteTestCase extends PrefixableRouteTestCase {
    use ViewableRoute;

    protected function assertViewInReceivedGetResponseFromRequestToFullPageRouteByRouteNameIs(
        string $view , array $routeParameters = [] , array $headers = [] ,
    ):void {
        $testResponse = $this->getRequestToFullPageRouteByRouteName( $routeParameters , $headers );
        $this->assertViewInResponseEqualTo($testResponse,$view);
    }

    protected function assertValueForContentTypeHeaderInReceivedResponseFromGetRequestToFullPageRouteByRouteNameEqualToTextHtml(
        array $routeParameters = [] , array $headers = [] ,
    ):void {
        $testResponse = $this->getRequestToFullPageRouteByRouteName($routeParameters , $headers);
        $this->assertValueForContentTypeHeaderInResponseEqualToTextHtml($testResponse);
    }
}
