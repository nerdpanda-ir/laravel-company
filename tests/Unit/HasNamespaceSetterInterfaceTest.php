<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Contracts\HasNamespaceSetterInterface ;

class HasNamespaceSetterInterfaceTest extends TestCase
{
    protected string $namespace = HasNamespaceSetterInterface::class ;
    public function test_is_exist():void {
        $isExist = interface_exists($this->namespace);
        $this->assertTrue(
            $isExist ,
            "doesnt exist {$this->namespace} interface !!!"
        );
    }
}
