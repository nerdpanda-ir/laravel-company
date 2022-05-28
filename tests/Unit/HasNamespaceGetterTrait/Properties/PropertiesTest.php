<?php

namespace Tests\Unit\HasNamespaceGetterTrait\Properties;

use PHPUnit\Framework\TestCase;
use App\Traits\HasNamespaceGetterTrait;

class PropertiesTest extends TestCase
{
    protected string $namespace = HasNamespaceGetterTrait::class ;
    public function test_no_have_property():void {
        $reflection = new \ReflectionClass($this->namespace);
        $properties = $reflection->getProperties();
        $this->assertEmpty($properties,"$this->namespace  should no have any property ");
    }
}
