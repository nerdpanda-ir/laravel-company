<?php namespace Tests ;?>
<?php
use Tests\PageTestCase ;

class ViewPageTestCase extends PageTestCase {
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
        $testResponse = $this->getRequestToPageRouteByRouteName() ;
        $testResponse->assertViewIs($view);
    }
}
