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
}
