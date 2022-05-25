<?php namespace Tests ;

use App\Traits\HasNamespaceGetterTrait;

 ?>
<?php
class EntityTestCase extends TestCase {
    use HasNamespaceGetterTrait;
    protected string $namespace;
}
