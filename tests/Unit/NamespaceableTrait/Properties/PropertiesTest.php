<?php

namespace Tests\Unit\NamespaceableTrait\Properties;

use PHPUnit\Framework\TestCase;
use App\Traits\NamespaceableTrait;

class PropertiesTest extends TestCase
{
    protected string $namespace = NamespaceableTrait::class ;
    public function test_no_have_property():void {
        $reflection = new \ReflectionClass($this->namespace);
        $properties = $reflection->getProperties();
        $this->assertEmpty($properties,"$this->namespace  should no have any property ");
    }
}
