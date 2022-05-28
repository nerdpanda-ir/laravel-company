<?php

namespace Tests\Unit\NamespaceableTrait;

use App\Traits\HasNamespaceGetterTrait;
use App\Traits\HasNamespaceSetterTrait;
use PHPUnit\Framework\TestCase;
use App\Traits\NamespaceableTrait;

class NamespaceableTraitTest extends TestCase
{
    protected string $namespace = NamespaceableTrait::class ;

    public function test_is_exist():void {
        $isExist = trait_exists($this->namespace);
        $this->assertTrue($isExist,"should is exist $this->namespace trait ");
    }
    public function test_should_use_from_two_trait():void {
        $uses = class_uses($this->namespace);
        $expect = 2 ;
        $actual = count($uses);
        $this->assertEquals($expect,$actual,"$this->namespace trait should use from two trait !!!");
    }
    public function test_should_use_from_HasNamespaceGetterTrait():void {
        $uses = class_uses($this->namespace);
        $namespace = HasNamespaceGetterTrait::class ;
        $isUse = in_array($namespace,$uses);
        $this->assertTrue($isUse,"$this->namespace trait should use from $namespace trait !!!");
    }
    public function test_should_use_from_HasNamespaceSetterTrait():void {
        $uses = class_uses($this->namespace);
        $namespace = HasNamespaceSetterTrait::class ;
        $isUse = in_array($namespace,$uses);
        $this->assertTrue($isUse,"$this->namespace trait should use from $namespace trait !!!");
    }
}
