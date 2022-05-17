<?php namespace Tests ;?>
<?php

use Illuminate\Testing\TestResponse;

class RouteTestCase extends TestCase {
    protected string $pageRoute;

    protected function pageRoute():string {
        return $this->pageRoute;
    }

    protected function assertHeaderValueInResponseEqualTo(
        TestResponse $response , string $header , string $value ,
    ):void {
        $response->assertHeader($header,$value);
    }

    protected function assertValueForContentTypeHeaderEqualTo(
        TestResponse $response, string $value
    ):void {
        $this->assertHeaderValueInResponseEqualTo($response,'content-type',$value);
    }
}
