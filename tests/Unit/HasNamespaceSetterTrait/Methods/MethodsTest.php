<?php

namespace Tests\Unit\HasNamespaceSetterTrait\Methods;

use PHPUnit\Framework\TestCase;
use App\Traits\HasNamespaceSetterTrait;

class MethodsTest extends TestCase
{
    protected string $namespace = HasNamespaceSetterTrait::class ;
    public function test_should_only_have_one_method():void {
        $traitReflection = new \ReflectionClass($this->namespace);
        $methods = $traitReflection->getMethods();
        $methodsCount = count($methods);
        $this->assertEquals(0,$methodsCount);
    }
}
