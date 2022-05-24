<?php

namespace Tests\Unit\HasNamespaceSetterTrait;

use PHPUnit\Framework\TestCase;
use App\Traits\HasNamespaceSetterTrait ;

class HasNamespaceSetterTraitTest extends TestCase
{
    protected string $namespace = HasNamespaceSetterTraitTest::class ; 
    public function test_is_exist():void {
        $isExist = trait_exists($this->namespace);
        $this->assertTrue($isExist,"trait $this->namespace should is exist !!!");
    }    
}
