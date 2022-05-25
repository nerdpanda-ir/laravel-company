<?php namespace Tests ;

use App\Traits\HasNamespaceGetterTrait;
use App\Traits\HasNamespaceSetterTrait;

 ?>
<?php
class EntityTestCase extends TestCase {
    use HasNamespaceGetterTrait,HasNamespaceSetterTrait;
    protected string $namespace;
}
