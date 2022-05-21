<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Contracts\HasNamespaceSetterInterface;

class SetNamespaceMethodInHasNamespaceGetterInterfaceTest extends TestCase
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
}
