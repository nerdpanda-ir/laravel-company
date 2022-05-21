<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use Tests\EntityTestCase;

class EntityTestCaseNamespacePropertyTest extends TestCase
{
    protected string $namespace = EntityTestCase::class ;
    public function test_should_exist_namespace_property_in_Entity_test_Case_class ():void {
        $isExist = property_exists($this->namespace,'namespace');
        $this->assertTrue($isExist,"no exist \$namespace property in $this->namespace ");
    }
}
