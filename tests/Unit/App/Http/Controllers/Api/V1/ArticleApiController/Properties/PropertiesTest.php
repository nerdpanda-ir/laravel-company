<?php

namespace Tests\Unit\App\Http\Controllers\Api\V1\ArticleApiController\Properties;

use App\Http\Controllers\Api\V1\ArticleApiController as Entity;
use PHPUnit\Framework\TestCase;

class PropertiesTest extends TestCase
{
    protected string $namespace = Entity::class ;
    public function test_dont_be_have_property():void {
        $reflection = new \ReflectionClass($this->namespace);
        $properties = $reflection->getProperties();
        $selfProperties = array_filter($properties,function (\ReflectionProperty $property){
            return $property->getDeclaringClass()->name==$this->namespace;
        });

        if (!empty($selfProperties))
            $selfProperties = array_map(function (\ReflectionProperty $property){
                return (string)$property;
            },$selfProperties);
        $this->assertEmpty(
            $selfProperties,
            " controller $this->namespace dont be have property !!! should remove \n\n\t\t".implode("\n\t\t" ,$selfProperties)
        );
    }
}
