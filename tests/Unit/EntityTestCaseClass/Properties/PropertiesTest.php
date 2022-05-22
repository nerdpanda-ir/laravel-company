<?php

namespace Tests\Unit\EntityTestCaseClass;

use PHPUnit\Framework\TestCase;
use Tests\EntityTestCase;

class PropertiesTest extends TestCase
{
    protected string $namespace = EntityTestCase::class ;
    public function test_should_only_single_property():void {
        $classReflection = new \ReflectionClass($this->namespace);
        $properties = $classReflection->getProperties();
        $classProperties = [];
        foreach ($properties as $property)
            if ($property->class==$this->namespace)
                $classProperties[] = $property->name;
        $classPropertiesCount = count($classProperties);
        $expected = 1 ;
        $this->assertEquals(
            $expected ,
            $classPropertiesCount ,
            "class : $this->namespace just should have single property !!! "
        );
    }
}
