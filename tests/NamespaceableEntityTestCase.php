<?php namespace Tests ; ?>
<?php

use App\Contracts\Tests\NamespaceableEntityTestCaseInterface;
use App\Traits\Tests\NamespaceableEntityTestCaseTrait;

class NamespaceableEntityTestCase extends EntityTestCase implements NamespaceableEntityTestCaseInterface {
    use NamespaceableEntityTestCaseTrait;
}
