<?php

namespace Tests\Unit\HasNamespaceSetterInterface\Methods\SetNamespace;

use PHPUnit\Framework\TestCase;
use App\Contracts\HasNamespaceSetterInterface;
//@todo create method for is static or none static
//@todo create method for abstract or final
class SetNamespaceMethodTest extends TestCase
{
    protected string $namespace = HasNamespaceSetterInterface::class ;
    protected string $method = 'setNamespace';
    public function test_method_exist():void {
        $exist = method_exists($this->namespace , $this->method);
        $this->assertTrue(
            $exist ,
            "interface => $this->namespace should have $this->method() method !!! "
        );
    }
    public function test_is_not_static():void {
        $methodReflection = new \ReflectionMethod($this->namespace , $this->method);
        $isNotStatic = !$methodReflection->isStatic();
        $this->assertTrue($isNotStatic,"method $this->method() from interface $this->namespace dont be static !!! ");
    }
    public function test_is_not_final():void {
        $methodReflection = new \ReflectionMethod($this->namespace , $this->method);
        $isNotFinal = !$methodReflection->isFinal() ;
        $this->assertTrue($isNotFinal,"method $this->method()  in class $this->namespace dont be final !!!");
    }
    public function test_is_abstract():void {
        $methodReflection = new \ReflectionMethod($this->namespace , $this->method) ;
        $isAbstract = $methodReflection->isAbstract();
        $this->assertTrue($isAbstract,"method $this->method() in $this->namespace interface should is abstract !!!! ");
    }
    public function test_should_method_is_void(): void {
        $methodReflection = new \ReflectionMethod($this->namespace,$this->method);
        $returnType = (string)$methodReflection->getReturnType();
        $expected = 'void';
        $this->assertEquals(
            $expected, $returnType ,
            "method $this->method() from interface $this->namespace should is void !!!"
        );
    }
}
