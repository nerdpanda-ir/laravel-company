<?php namespace Tests ;?>
<?php

use Illuminate\Testing\TestResponse;

trait ViewableRoute {
    protected function assertViewInResponseEqualTo(TestResponse $response , string $view ):void {
        $response->assertViewIs($view);
    }
}
