<?php namespace Tests ; ?>
<?php
class NoPrefixableViewRouteTestCase extends NoPrefixableRouteTestCase {
    use ViewableRoute;

    protected function assertViewInReceivedGetResponseFromRequestToPageRouteByRouteNameIs(
        string $view , array $routeParameters = [] , array $headers = [] ,
    ):void {
        $testResponse = $this->getRequestToPageRouteByRouteName($routeParameters , $headers) ;
        $this->assertViewInResponseEqualTo($testResponse,$view);
    }

    protected function assertValueForContentTypeHeaderInReceivedGetResponseFromRequestToPageRouteByRouteNameEqualToTextHtml(
        array $routeParameters = [] , array $headers = []
    ):void {
        $testResponse = $this->getRequestToPageRouteByRouteName($routeParameters,$headers);
        $this->assertValueForContentTypeHeaderInResponseEqualToTextHtml($testResponse);
    }
}
