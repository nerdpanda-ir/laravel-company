<?php

namespace Tests\Unit\HasNamespaceGetterTrait;

use PHPUnit\Framework\TestCase;
use App\Traits\HasNamespaceGetterTrait;

class HasNamespaceGetterTraitTest extends TestCase
{
    protected string $namespace = HasNamespaceGetterTrait::class ;
    public function test_is_exist():void {
        $exist = trait_exists($this->namespace);
        $this->assertTrue($exist,"trait $this->namespace doesnt exist !!! ");
    }
    public function test_never_use_other_traits():void {
        if (trait_exists($this->namespace)){
            $uses = class_uses($this->namespace);
            $this->assertEmpty($uses," $this->namespace trait never use other traits !!! ");
        }
        else
            $this->fail(" trait $this->namespace is missing !!!");
    }
}
