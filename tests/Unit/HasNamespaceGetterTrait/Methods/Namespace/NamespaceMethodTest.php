<?php

namespace Tests\Unit\HasNamespaceGetterTrait\Methods\Namespace;

use App\Traits\HasNamespaceGetterTrait;
use PHPUnit\Framework\TestCase;

class NamespaceMethodTest extends TestCase
{
    protected string $namespace = HasNamespaceGetterTrait::class;
    protected string $method = 'namespace';
    public function test_is_exist():void {
        $isExist = method_exists($this->namespace , $this->method);
        $this->assertTrue($isExist," $this->namespace trait should have $this->method() method !!");
    }
    public function test_is_public():void {
        $methodReflection = new \ReflectionMethod($this->namespace,$this->method);
        $isPublic = $methodReflection->isPublic();
        $this->assertTrue($isPublic," $this->method() method in $this->namespace trait should is public !!! ");
    }
    public function test_never_static():void {
        $methodReflection = new \ReflectionMethod($this->namespace , $this->method);
        $isNotStatic = !$methodReflection->isStatic();
        $this->assert($isNotStatic,"method $this->method() in $this->namespace trait should is none static !!!");
    }
    public function test_never_final():void {
        $methodReflection = new \ReflectionMethod($this->namespace , $this->method);
        $isNotFinal = !$methodReflection->isFinal();
        $this->assertTrue($isNotFinal,"method $this->method() in $this->namespace trait dont be final !!! ");
    }
    public function test_never_abstract():void {
        $methodReflection = new \ReflectionMethod($this->namespace , $this->method);
        $isNotAbstract = !$methodReflection->isAbstract();
        $this->assertTrue($isNotAbstract,"method $this->method() in $this->namespace trait dont be abstract !!!");
    }
    public function test_should_just_have_string_return_type():void{
        $expect = ['string'];
        sort($expect,SORT_STRING);
        $expect = implode('|',$expect);
        $methodReflection = new \ReflectionMethod($this->namespace , $this->method);
        $returnTypes = (string)$methodReflection->getReturnType();
        if (strlen($returnTypes)!=0){
            $returnTypes = explode('|',$returnTypes);
            sort($returnTypes,SORT_STRING);
            $returnTypes = implode('|',$returnTypes);
            $this->assertEquals($expect , $returnTypes  , "return type for method : $this->method() in $this->namespace should is $expect but is $returnTypes");
        }
        else
            $this->fail("no return type detect for method $this->method() in $this->namespace trait !!! should return type is $expect");

    }
}
