<?php

namespace Tests\Unit\HasNamespaceSetterTrait\Methods\SetNamespace;

use PHPUnit\Framework\TestCase;
use App\Traits\HasNamespaceSetterTrait;

class SetNamespaceTest extends TestCase
{
    protected string $namespace = HasNamespaceSetterTrait::class ;
    protected string $method = 'setNamespace';
    public function test_is_exist():void {
        $isExist = method_exists($this->namespace , $this->method);
        $this->assertTrue($isExist,"method $this->method() in $this->namespace is missing ");
    }
    public function test_is_public():void {
        $reflection = new \ReflectionMethod($this->namespace,$this->method);
        $isPublic = $reflection->isPublic();
        $this->assertTrue($isPublic,"method $this->method() in $this->namespace trait should be public !!! ");
    }
    public function test_is_no_static():void {
        $reflection = new \ReflectionMethod($this->namespace , $this->method) ;
        $isNotStatic = !$reflection->isStatic() ;
        $this->assertTrue($isNotStatic,"method $this->method() in $this->namespace dont be static !!!");
    }
    public function test_is_no_abstract():void {
        $reflection = new \ReflectionMethod($this->namespace, $this->method);
        $isNoAbstract = !$reflection->isAbstract();
        $this->assertTrue($isNoAbstract," method $this->method() in $this->namespace trait should is no abstract !!! ");
    }
    public function test_is_no_final():void {
        $reflection = new \ReflectionMethod($this->namespace , $this->method) ;
        $isNoFinal = !$reflection->isFinal();
        $this->assertTrue($isNoFinal,"method $this->method() in $this->namespace trait dont be final !!! ");
    }
    public function test_should_have_return_type():void {
        $methodReflection = new \ReflectionMethod($this->namespace,$this->method);
        $hasReturnType = $methodReflection->hasReturnType();
        $this->assertTrue($hasReturnType,"method $this->method() from $this->namespace trait should have return type !!!");
    }
    
}
