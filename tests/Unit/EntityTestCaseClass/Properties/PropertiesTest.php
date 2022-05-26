<?php

namespace Tests\Unit\EntityTestCaseClass\Properties;

use PHPUnit\Framework\TestCase;
use Tests\Unit\EntityTestCase;

class PropertiesTest extends TestCase
{
    protected string $namespace = EntityTestCase::class ;
    public function test_no_exist_any_property():void {
        $reflection = new \ReflectionClass($this->namespace);
        $properties = $reflection->getProperties();
        $properties = array_filter($properties,function (\ReflectionProperty $property){
            return $property->class==$this->namespace;
        });
        $this->assertEmpty($properties," must no have property $this->namespace class !!!");
    }

}
