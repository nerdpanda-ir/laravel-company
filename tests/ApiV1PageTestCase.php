<?php namespace Tests ; ?>
<?php
use Tests\PageTestCase ;
use Tests\PageTestHasPrefix ;

class ApiV1PageTestCase extends PageTestCase {
    use \Tests\PageTestHasPrefix ;
    public function __construct(?string $name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $this->pageRoutePrefix = 'api.v1.pages.';
    }
}
