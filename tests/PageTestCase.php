<?php namespace Tests ; ?>
<?php
use Tests\TestCase ;
abstract class PageTestCase extends TestCase {
    protected abstract function url():string ;
}
