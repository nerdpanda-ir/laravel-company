<?php

namespace Tests\Unit\EntityTestCaseClass\Properties;

use PHPUnit\Framework\TestCase;
use Tests\EntityTestCase;
//@todo create method for static properties count check
//@todo create method for none static properties count check
//@todo create method for const | final  properties count check
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
    public function test_no_have_static_property():void{
        $classReflection = new \ReflectionClass($this->namespace);
        $properties = $classReflection->getProperties();
        $staticProperties = [] ;
        foreach ($properties as $property)
            if ($property->class==$this->namespace and $property->isStatic())
                $staticProperties[] = $property->name;
        $staticPropertiesCount = count($staticProperties);
        $this->assertEquals(
            0 ,
            $staticPropertiesCount ,
            "class $this->namespace should have 0 static property !!!! "
        );
    }
}
