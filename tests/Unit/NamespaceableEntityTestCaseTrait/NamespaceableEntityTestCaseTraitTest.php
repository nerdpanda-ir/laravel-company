<?php

namespace Tests\Unit\NamespaceableEntityTestCaseTrait;

use App\Traits\NamespaceableTrait;
use PHPUnit\Framework\TestCase;
use App\Traits\Tests\NamespaceableEntityTestCaseTrait;

class NamespaceableEntityTestCaseTraitTest extends TestCase
{
    protected string $namespace = NamespaceableEntityTestCaseTrait::class ;
    public function test_is_exist():void {
        $isExist = trait_exists($this->namespace);
        $this->assertTrue($isExist,"missing $this->namespace trait !!!");
    }
    public function test_should_use_one_Trait():void {
        $uses = class_uses($this->namespace);
        $expect = 1 ;
        $this->assertCount($expect, $uses,"$this->namespace trait should use one trait !!!");
    }
    public function test_should_use_namespaceableTrait():void {
        $uses = class_uses($this->namespace);
        $expect = NamespaceableTrait::class;
        $isUse = in_array($expect , $uses);
        $this->assertTrue($isUse,"$this->namespace trait should use $expect trait ");
    }
}
