<?php namespace Tests ;

use App\Contracts\Tests\EntityTestCaseInterface;
use App\Traits\HasNamespaceGetterTrait;
use App\Traits\HasNamespaceSetterTrait;

 ?>
<?php
class EntityTestCase extends TestCase implements EntityTestCaseInterface {
    use HasNamespaceGetterTrait,HasNamespaceSetterTrait;
    protected string $namespace;
}
