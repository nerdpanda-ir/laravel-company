<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Contracts\HasNamespaceGetterInterface;

class HasNamespaceGetterInterfaceTest extends TestCase
{
    protected string $namespace = HasNamespaceGetterInterface::class ;
    public function test_is_exist():void {
        $isExist = interface_exists($this->namespace) ;
        $this->assertTrue($isExist,"doesnt exist interface $this->namespace");
    }
}
