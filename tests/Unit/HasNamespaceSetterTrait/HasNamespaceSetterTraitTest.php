<?php

namespace Tests\Unit\HasNamespaceSetterTrait;

use PHPUnit\Framework\TestCase;
use App\Traits\HasNamespaceSetterTrait ;

class HasNamespaceSetterTraitTest extends TestCase
{
    //@todo can test property ?
    protected string $namespace = HasNamespaceSetterTraitTest::class ;
    public function test_is_exist():void {
        $isExist = trait_exists($this->namespace);
        $this->assertTrue($isExist,"trait $this->namespace should is exist !!!");
    }
    public function test_never_use_other_traits():void {
        $uses = class_uses($this->namespace);
        $this->assertEmpty($uses,"$this->namespace trait should no use other traits ");
    }
}
