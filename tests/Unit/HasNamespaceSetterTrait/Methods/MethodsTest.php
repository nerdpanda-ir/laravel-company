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
    //@todo
    public function test_just_have_public_method():void {
        $traitReflection = new \ReflectionClass($this->namespace);
        $methods = $traitReflection->getMethods();
        $publicMethods = array_filter($methods,function (\ReflectionMethod $method){
            return $method->isPublic();
        });
        $nonePublicMethods = array_map(function (\ReflectionMethod $method){
            $accessModifier = '';
            if ($method->isProtected())
                $accessModifier = 'protected';
            else if ($method->isPrivate())
                $accessModifier = 'private';
            return $method->name."() is $accessModifier";
        },array_diff($methods,$publicMethods)
        );
        $nonePublicMethodsCount = count($nonePublicMethods);
        $message = '';
        if ($nonePublicMethodsCount>0)  {
            if ($nonePublicMethodsCount==1)
                $message = " method $nonePublicMethods[0] ";
            else
                $message = " methods ".implode(' , ',$nonePublicMethods);
            $message .=" in $this->namespace trait -> should be public !!!";
        }
        $this->assertEquals(0,$nonePublicMethodsCount,$message);
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
    public function test_no_have_final_method():void {
        $traitReflection = new \ReflectionClass($this->namespace);
        $methods = $traitReflection->getMethods();
        $finalMethods = array_filter($methods,function (\ReflectionMethod $method){
            return $method->isFinal();
        });
        $finalMethods[] = 'ez';
        $finalMethods[] = 'gg';
        $finalMethodsCount = count($finalMethods);
        $message = '';
        if ($finalMethodsCount>0) {
            if ($finalMethodsCount==1)
                $message = "method $finalMethods[0]() ";
            else
                $message = 'method'.implode('() , ',$finalMethods).'() ';
            $message.=" in $this->namespace trait should dont be final !!! ";
        }
        $this->assertEmpty($finalMethods,$message);
    }
}
