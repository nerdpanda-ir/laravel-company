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
        $this->assertEquals(1,$methodsCount);
    }
    //@todo
    public function test_just_have_public_method():void {
        $traitReflection = new \ReflectionClass($this->namespace);
        $methods = $traitReflection->getMethods();
        if (!empty($methods)){
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
        else
            $this->fail("no found any method in $this->namespace trait ");
    }
    public function test_no_have_static_method():void {
        $traitReflection = new \ReflectionClass($this->namespace);
        $methods = $traitReflection->getMethods();
        if (!empty($methods)){
            $staticMethods = array_filter($methods,function (\ReflectionMethod $method){
                return $method->isStatic();
            });
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
        else
            $this->fail("no found any method in $this->namespace trait !!!");

    }
    public function test_no_have_final_method():void {
        $traitReflection = new \ReflectionClass($this->namespace);
        $methods = $traitReflection->getMethods();
        if (!empty($methods)){
            $finalMethods = array_filter($methods,function (\ReflectionMethod $method){
                return $method->isFinal();
            });
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
        else
            $this->fail("no found any method in $this->namespace trait !!!");
    }
    public function test_no_have_abstract_method():void {
        $reflectionTrait = new \ReflectionClass($this->namespace);
        $methods = $reflectionTrait->getMethods();
        $abstractMethods = array_filter($methods,function (\ReflectionMethod $method){
            return $method->isAbstract();
        });
        $abstractMethodsCount = count($abstractMethods);
        $message = '';
        if (!empty($abstractMethods)) {
            if ($abstractMethodsCount==1)
                $message = "method $abstractMethods[0]() ";
            else
                $message = "method ".implode('() , ',$abstractMethods)."() ";
            $message.=" in $this->namespace trait should be none abstract !!! ";
        }
        $this->assertEmpty($abstractMethods , $message);
    }
}
