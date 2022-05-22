<?php

namespace Tests\Unit\NamespaceableInterface;

use PHPUnit\Framework\TestCase;
use App\Contracts\NamespaceableInterface;

class NamespaceableInterfaceTest extends TestCase
{
    protected string $namespace = NamespaceableInterface::class ;
    public function test_is_exist():void {
        $isExist = interface_exists($this->namespace);
        $this->assertTrue(
            $isExist ,
            "$this->namespace interface doesnt exist !!! "
        );
    }
}
