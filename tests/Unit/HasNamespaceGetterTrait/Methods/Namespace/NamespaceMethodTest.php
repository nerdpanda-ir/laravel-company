<?php

namespace Tests\Unit\HasNamespaceGetterTrait\Methods\Namespace;

use App\Traits\HasNamespaceGetterTrait;
use PHPUnit\Framework\TestCase;

class NamespaceMethodTest extends TestCase
{
    protected string $namespace = HasNamespaceGetterTrait::class;
    protected string $method = 'namespace';
    public function test_is_exist():void {
        $isExist = method_exists($this->namespace , $this->method);
        $this->assertTrue($isExist," $this->namespace trait should have $this->method() method !!");
    }
    
}
