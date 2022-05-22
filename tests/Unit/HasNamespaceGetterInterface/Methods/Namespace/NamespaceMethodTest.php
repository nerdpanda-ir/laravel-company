<?php

namespace Tests\Unit\HasNamespaceGetterInterface\Methods\Namespace;

use PHPUnit\Framework\TestCase;
use App\Contracts\HasNamespaceGetterInterface;

class NamespaceMethodTest extends TestCase
{
    protected string $namespace = HasNamespaceGetterInterface::class ;
    public function test_is_exist():void {
        $isExist = method_exists($this->namespace,'namespace');
        $this->assertTrue($isExist, " should interface => $this->namespace has namespace() method");
    }
    public function test_return_type_is_string():void {
        // @todo have bug here when method return union !!!
        $methodReflection = new \ReflectionMethod($this->namespace,'namespace');
        $returnType = (string)$methodReflection->getReturnType();
        $expected = 'string';
        $this->assertEquals($expected,$returnType," return type for method namespace() from {$this->namespace} should is `string`");
    }
}
