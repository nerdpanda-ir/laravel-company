<?php namespace Tests ; ?>
<?php
class NoPrefixableViewRouteTestCase extends NoPrefixableRouteTestCase {
    use ViewableRoute;
    
    protected function assertViewInReceivedGetResponseFromRequestToPageRouteByRouteNameIs(
        string $view , array $routeParameters = [] , array $headers = [] ,
    ):void {
        /** @todo create view page test
        create assert for text html
         *
         * may be automaticaly run ->
         * create json page test
         * create assert for application/json
         */
        $testResponse = $this->getRequestToPageRouteByRouteName($routeParameters , $headers) ;
        $testResponse->assertViewIs($view);
    }
}
