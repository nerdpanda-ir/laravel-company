<?php

namespace Tests\Unit\App\Http\Controllers\ShowArticleController\Properties;

use App\Http\Controllers\ShowArticleController;
use PHPUnit\Framework\TestCase;

class PropertiesTest extends TestCase
{
    protected string $namespace = ShowArticleController::class ;
    public function test_dont_be_have_property():void {
        $reflection = new \ReflectionClass($this->namespace);
        $properties = $reflection->getProperties();
        $selfProperties = array_filter($properties,function (\ReflectionProperty $property){
            return $property->getDeclaringClass()->name==$this->namespace;
        });

        $selfPropertiesCount = count($selfProperties);
        $message = '' ;
        $expect = 0 ;
        if ($selfPropertiesCount!=$expect){
            $message = "controller $this->namespace ";
            $propertiesImplode ='';
            if ($selfPropertiesCount>0){
                $selfProperties = array_map(function (\ReflectionProperty $property){
                    return (string)$property;
                },$selfProperties);
                $propertiesImplode = "\n\n\t\t".implode(PHP_EOL,$selfProperties);
            }
            if ($selfPropertiesCount>$expect)
                $message.='more';
            else
                $message.='less';
            $message.=" than expected have property !!\n$this->namespace controller should have $expect property but actually have $selfPropertiesCount property !!!! $propertiesImplode ";
        }
        $this->assertEquals($expect, $selfPropertiesCount , $message);
    }
}
