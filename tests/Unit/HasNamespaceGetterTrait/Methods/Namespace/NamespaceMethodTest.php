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
}
