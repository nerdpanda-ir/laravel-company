<?php

namespace Tests\Unit\EntityTestCaseClass;

use PHPUnit\Framework\TestCase;
use Tests\EntityTestCase;

class EntityTestCaseClassTest extends TestCase
{
    protected string $namespace = EntityTestCase::class ;
    public function test_is_exist():void {
        $isExist = class_exists($this->namespace);
        $this->assertTrue($isExist," missing class $this->namespace
         ");
    }
    public function test_dont_Be_final():void {
        $reflection = new \ReflectionClass($this->namespace);
        $isNotFinal = !$reflection->isFinal();
        $this->assertTrue($isNotFinal,"$this->namespace dont be final !!");
    }
    public function test_should_is_abstract():void {
        $reflectionClass = new \ReflectionClass($this->namespace);
        $isAbstract = $reflectionClass->isAbstract();
        $this->assertTrue($isAbstract,"class $this->namespace should is Abstract !!! ");
    }
    public function test_no_implement():void {
        $implements = class_implements($this->namespace);
        $this->assertEmpty($implements," $this->namespace never implement any interface !!! ");
    }
    public function test_no_use():void {
        $uses = class_uses($this->namespace);
        $this->assertEmpty($uses,"$this->namespace class no use any trait !!! ");
    }
}
