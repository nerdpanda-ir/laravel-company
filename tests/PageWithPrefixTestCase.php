<?php namespace Tests ; ?>
<?php

use Tests\PageTestCase as TestCase;
use Illuminate\Testing\TestResponse;

class PageWithPrefixTestCase extends TestCase {
     protected string $pageRoutePrefix;

     protected function pageRoutePrefix() :string {
         return $this->pageRoutePrefix;
     }

     protected function pageRouteGenerateWithPrefix(string $pageRoute):string {
         return $this->pageRoutePrefix.$pageRoute;
     }

     protected function pageRouteWithPrefix():string {
         return $this->pageRouteGenerateWithPrefix($this->pageRoute);
     }

     /**
      * this method send get request to pageRoutePrefix +  page route by route name !!!!
      * @param array $routeParameters
      * @param array $headers
      * @return TestResponse
      */
     protected function getRequestToFullPageRouteByRouteName(
         array $routeParameters = [] ,
         array $headers = [] ,
     ):TestResponse {
         return $this->get(
             route($this->pageRouteWithPrefix(), $routeParameters ) ,
             $headers
         );
     }
 }
