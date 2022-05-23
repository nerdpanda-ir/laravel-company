<?php

namespace Tests\Unit\HasNamespaceGetterTraitTest;

use PHPUnit\Framework\TestCase;
use App\Traits\HasNamespaceGetterTrait;

class MethodsTest extends TestCase
{
    protected string $namespace = HasNamespaceGetterTrait::class;
    public function test_should_have_one_method():void {
        $traitReflection = new \ReflectionClass($this->namespace);
        $methods = $traitReflection->getMethods();
        $methodsCount = sizeof($methods);
        $expect = 1 ;
        $this->assertEquals($expect,$methodsCount,"$this->namespace trait should have just one method ");
    }
}
