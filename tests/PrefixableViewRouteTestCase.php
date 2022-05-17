<?php namespace Tests ; ?>
<?php
class PrefixableViewRouteTestCase extends PrefixableRouteTestCase {
    protected function assertViewInReceivedGetResponseFromRequestToFullPageRouteByRouteNameIs(
        string $view , array $routeParameters = [] , array $headers = [] ,
    ):void {
        $testResponse = $this->getRequestToFullPageRouteByRouteName( $routeParameters , $headers );
        $testResponse->assertViewIs($view);
    }
}
