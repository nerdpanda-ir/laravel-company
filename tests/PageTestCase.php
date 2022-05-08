<?php namespace Tests ; ?>
<?php
use Tests\TestCase ;
class PageTestCase extends TestCase {
    protected string $pageRoute;
    protected abstract function url():string ;
}
