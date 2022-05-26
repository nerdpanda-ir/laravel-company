<?php

namespace Tests\Unit\EntityTestCaseClass;

use App\Contracts\Tests\EntityTestCaseInterface;
use App\Traits\HasNamespaceGetterTrait;
use App\Traits\HasNamespaceSetterTrait;
use App\Traits\NamespaceableTrait;
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
    public function test_no_abstract():void {
        $classReflection = new \ReflectionClass($this->namespace);
        $isNotAbstract = !$classReflection->isAbstract();
        $this->assertTrue($isNotAbstract,"$this->namespace class should is not abstract !!!");
    }
    public function test_should_use_from_one_trait():void {
        $uses = class_uses($this->namespace);
        $expect = 1 ;
        $this->assertEquals($expect,count($uses)," $this->namespace class should use one trait ");
    }
    public function test_should_use_NamespaceableTrait():void {
        $uses = class_uses($this->namespace);
        $namespace = NamespaceableTrait::class ;
        $isUse = in_array($namespace,$uses);
        $this->assertTrue($isUse,"$this->namespace class should use $namespace trait !!");
    }
    public function test_should_use_HasNamespaceGetterTrait():void {
        $uses = class_uses($this->namespace);
        $traitNamespace = HasNamespaceGetterTrait::class ;
        $isUse = in_array($traitNamespace,$uses);
        $this->assertTrue($isUse , "$this->namespace class should use ".HasNamespaceGetterTrait::class.' trait !!!! ');
    }
    public function test_should_use_HasNamespaceSetterTrait():void {
        $uses = class_uses($this->namespace);
        $isUsed = in_array(HasNamespaceSetterTrait::class , $uses);
        self::assertTrue($isUsed,"$this->namespace class should use from".HasNamespaceSetterTrait::class ." trait !!!");
    }
    public function test_should_implement_EntityTestCaseInterface():void {
        $classReflection = new \ReflectionClass($this->namespace);
        $isImplement = $classReflection->implementsInterface(EntityTestCaseInterface::class);
        $this->assertTrue($isImplement,"$this->namespace should implement ".EntityTestCaseInterface::class.' interface !!!' );
    }

    // @todo test namespace method  , set namespace method !!!
}
