<?php

namespace Tests\Unit\NamespaceableEntityTestCaseTrait;

use PHPUnit\Framework\TestCase;
use App\Traits\Tests\NamespaceableEntityTestCaseTrait;

class NamespaceableEntityTestCaseTraitTest extends TestCase
{
    protected string $namespace = NamespaceableEntityTestCaseTrait::class ;
    public function test_is_exist():void {
        $isExist = trait_exists($this->namespace);
        $this->assertTrue($isExist,"missing $this->namespace trait !!!");
    }
}
