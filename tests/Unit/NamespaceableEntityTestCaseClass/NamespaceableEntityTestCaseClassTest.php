<?php

namespace Tests\Unit\NamespaceableEntityTestCaseClass;

use App\Contracts\Tests\NamespaceableEntityTestCaseInterface;
use App\Traits\NamespaceableEntityTestCaseTrait;
use PHPUnit\Framework\TestCase;
use Tests\EntityTestCase;
use Tests\Unit\NamespaceableEntityTestCase;
use Tests\TestCase as LaravelTestCase;
//@todo -> class test || service test -> create method for check isabstract || final -> isfinal() , isabstarct() ,,,,, trait using , interface using , extend parent ,....
class NamespaceableEntityTestCaseClassTest extends TestCase
{
    protected string $namespace = NamespaceableEntityTestCase::class ;

    public function test_is_exist():void {
        $isExist = class_exists($this->namespace);
        $this->assertTrue(
            $isExist ,
            " no exist $this->namespace class !!! "
        );
    }
    public function test_should_extend_from_EntityTestCase():void {
        $isExtend = get_parent_class($this->namespace) ;
        $expect = EntityTestCase::class;
        $this->assertEquals( $expect ,$isExtend," class {$this->namespace} should extend ".$expect .' class !!!');
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
    public function test_should_implement_one_interface():void {
        $parent = get_parent_class($this->namespace);
        $parentImplements = class_implements($parent);
        $selfImplements = class_implements($this->namespace);
        $diff = array_diff($selfImplements,$parentImplements);
        $expect = 1 ;
        $this->assertCount($expect,$diff," should $this->namespace class implement just $expect interface !!!");
    }
    public function test_should_implement_NamespaceableEntityTestCaseInterface():void {
        $classReflection = new \ReflectionClass($this->namespace);
        $expect = NamespaceableEntityTestCaseInterface::class ;
        $isImplement = $classReflection->implementsInterface($expect);
        $this->assertTrue($isImplement,"$this->namespace should implement ".$expect.' interface !!!' );
    }
    public function test_should_use_from_one_trait():void {
        $uses = class_uses($this->namespace);
        $expect = 1 ;
        $this->assertEquals($expect,count($uses)," $this->namespace class should use one trait ");
    }
    public function test_should_use_NamespaceableEntityTestCaseTrait():void {
        $uses = class_uses($this->namespace);
        $namespace = NamespaceableEntityTestCaseTrait::class ;
        $isUse = in_array($namespace,$uses);
        $this->assertTrue($isUse,"$this->namespace class should use $namespace trait !!");
    }
}
