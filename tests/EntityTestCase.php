<?php namespace Tests ;

use App\Contracts\Tests\EntityTestCaseInterface;
use App\Traits\HasNamespaceGetterTrait;
use App\Traits\HasNamespaceSetterTrait;
use App\Traits\NamespaceableTrait;

?>
<?php
class EntityTestCase extends TestCase implements EntityTestCaseInterface {
    use NamespaceableTrait;
    protected string $namespace;
}
