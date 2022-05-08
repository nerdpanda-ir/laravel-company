<?php namespace Tests ; ?>
<?php
use Tests\PageTestCase ;
use Tests\PageTestHasPrefix ;

class ApiV1PageTestCase extends PageTestCase {
    use \Tests\PageTestHasPrefix ;

    protected string $pageRoutePrefix = 'api.v1.page.';

}
