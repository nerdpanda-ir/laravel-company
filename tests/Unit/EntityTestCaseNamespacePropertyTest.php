<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use Tests\EntityTestCase;

class EntityTestCaseNamespacePropertyTest extends TestCase
{
    protected string $namespace = EntityTestCase::class ;
    public function test_should_exist_namespace_property_class ():void {
        $isExist = property_exists($this->namespace,'namespace');
        $this->assertTrue($isExist,"no exist \$namespace property in $this->namespace ");
    }
    public function test_should_namespace_property_is_Protected():void {
        $namespaceInfo = new \ReflectionProperty($this->namespace , 'namespace');
        $isProtected = $namespaceInfo->isProtected();
        $this->assertTrue($isProtected,"should access modifier for \$namespace property in class => $this->namespace is protected !!! ");
    }
}
