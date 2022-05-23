<?php

namespace Tests\Unit\EntityTestCaseClass;

use App\Contracts\Tests\EntityTestCaseInterface;
use PHPUnit\Framework\TestCase;
use Tests\EntityTestCase;
use Tests\TestCase as LaravelTestCase;
//@todo -> class test || service test -> create method for check isabstract || final -> isfinal() , isabstarct() ,,,,, trait using , interface using , extend parent ,....
class EntityTestCaseClassTest extends TestCase
{
    protected string $namespace = EntityTestCase::class ;

    public function test_EntityTestCase_class_should_is_exist():void {
        $isExist = class_exists($this->namespace);
        $this->assertTrue(
            $isExist ,
            " no exist $this->namespace class !!! "
        );
    }
    public function test_EntityTestCaseClass_should_extend_from_TestCase():void {
        $isExtend = get_parent_class($this->namespace) ;
        $this->assertEquals(LaravelTestCase::class ,$isExtend," class {$this->namespace} should extend ".LaravelTestCase::class .' class !!!');
    }
    public function test_no_final():void {
        $classReflection = new \ReflectionClass($this->namespace);
        $isNoFinal = !$classReflection->isFinal();
        $this->assertTrue(
            $isNoFinal ,
            "$this->namespace class dont be final "
        );
    }
    public function test_should_implement_EntityTestCaseInterface():void {
        $classReflection = new \ReflectionClass($this->namespace);
        $isImplement = $classReflection->implementsInterface(EntityTestCaseInterface::class);
        $this->assertTrue($isImplement,"$this->namespace should implement ".EntityTestCaseInterface::class.' interface !!!' );
    }
    
    // @todo create abstract check
}
