<?php

namespace Tests\Unit\HasNamespaceSetterTrait\Methods;

use PHPUnit\Framework\TestCase;
use App\Traits\HasNamespaceSetterTrait;

class MethodsTest extends TestCase
{
    protected string $namespace = HasNamespaceSetterTrait::class ;
    public function test_should_only_have_one_method():void {
        $traitReflection = new \ReflectionClass($this->namespace);
        $methods = $traitReflection->getMethods();
        $methodsCount = count($methods);
        $this->assertEquals(0,$methodsCount);
    }
    public function test_no_have_static_method():void {
        $traitReflection = new \ReflectionClass($this->namespace);
        $methods = $traitReflection->getMethods();
        $staticMethods = array_filter($methods,function (\ReflectionMethod $method){
            return $method->isStatic();
        });
        $staticMethods[] = 'abol';
        $staticMethods[] = 'abdol';
        $staticMethodsCount = count($staticMethods);
        $message = '';
        if ($staticMethodsCount>0){
            if ($staticMethodsCount==1)
                $message = "method $staticMethods[0]() ";
            else
                $message = 'methods '.implode('() , ',$staticMethods).'() ';
            $message .= "should dont be static in $this->namespace !!!";
        }
        $this->assertEmpty($staticMethods,$message);
    }
}
