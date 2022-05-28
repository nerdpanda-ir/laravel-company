<?php

namespace Tests\Unit\HasNamespaceGetterInterface;

use PHPUnit\Framework\TestCase;
use App\Contracts\HasNamespaceGetterInterface;

class HasNamespaceGetterInterfaceTest extends TestCase
{
    protected string $namespace = HasNamespaceGetterInterface::class ;
    public function test_is_exist():void {
        $isExist = interface_exists($this->namespace) ;
        $this->assertTrue($isExist,"doesnt exist interface $this->namespace");
    }
    public function test_never_implement():void {
        $implements = class_implements($this->namespace);
        $this->assertEmpty($implements,"interface $this->namespace never implement other interface !!!");
    }
}
