<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Contracts\HasNamespaceGetterInterface;

class NamespaceMethodInHasNamespaceGetterInterfaceTest extends TestCase
{
    protected string $namespace = HasNamespaceGetterInterface::class ;
    public function test_is_exist():void {
        $isExist = method_exists($this->namespace,'namespace');
        $this->assertTrue($isExist, " should interface => $this->namespace has namespace() method");
    }
}
