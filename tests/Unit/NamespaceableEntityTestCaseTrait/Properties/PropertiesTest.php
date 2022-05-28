<?php

namespace Tests\Unit\NamespaceableEntityTestCaseTrait\Properties;

use PHPUnit\Framework\TestCase;
use App\Traits\Tests\NamespaceableEntityTestCaseTrait;

class PropertiesTest extends TestCase
{
    protected string $namespace = NamespaceableEntityTestCaseTrait::class ;
    public function test_no_have_property():void {
        $reflection = new \ReflectionClass($this->namespace);
        $properties = $reflection->getProperties();
        $this->assertEmpty($properties,"$this->namespace  should no have any property ");
    }
}
