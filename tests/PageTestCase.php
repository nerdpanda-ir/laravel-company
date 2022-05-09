<?php namespace Tests ; ?>
<?php
use Illuminate\Testing\TestResponse;
use Tests\TestCase ;

class PageTestCase extends TestCase {
    protected string $pageRoute;
    protected function pageRoute():string {
        return $this->pageRoute;
    }

    protected function sendBasicGetRequestByRouteName(array $headers = []):TestResponse {
        return $this->get(
            route($this->pageRoute()) ,
            $headers
        );
    }

}
