<?php namespace Tests ; ?>
<?php

use Illuminate\Testing\TestResponse;

trait JsonableRoute{
    protected function assertValueForContentTypeHeaderInResponseEqualToApplicationJson(
        TestResponse $response
    ) :void {
        $this->assertValueForContentTypeHeaderEqualTo($response,'application/json');
    }

    protected function assertJsonInResponseEqualTo(
        TestResponse $response , array | callable $expected , bool $strict = false
    ):void {
        $response->assertJson( $expected , $strict );
    }
}
