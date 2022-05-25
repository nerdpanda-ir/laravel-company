<?php

namespace Tests\Unit\NamespaceableTrait;

use PHPUnit\Framework\TestCase;
use Tests\Unit\NamespaceableTrait;

class NamespaceableTraitTest extends TestCase
{
    protected string $namespace = NamespaceableTrait::class ;

    public function test_is_exist():void {
        $isExist = trait_exists($this->namespace);
        $this->assertTrue($isExist,"should is exist $this->namespace trait ");
    }
}
