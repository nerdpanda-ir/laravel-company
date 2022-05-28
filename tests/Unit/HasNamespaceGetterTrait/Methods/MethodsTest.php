<?php

namespace Tests\Unit\HasNamespaceGetterTrait\Methods;

use PHPUnit\Framework\TestCase;
use App\Traits\HasNamespaceGetterTrait;

class MethodsTest extends TestCase
{
    protected string $namespace = HasNamespaceGetterTrait::class;
    public function test_should_only_have_one_method():void {
        $traitReflection = new \ReflectionClass($this->namespace);
        $methods = $traitReflection->getMethods();
        $methodsCount = sizeof($methods);
        $expect = 1 ;
        $this->assertEquals($expect,$methodsCount,"$this->namespace trait should have just one method ");
    }
    public function test_should_have_public_methods():void{
        $traitReflection = new \ReflectionClass($this->namespace);
        $methods = $traitReflection->getMethods();
        if (!empty($methods)){
            $nonePublicMethods = array_filter($methods , function (\ReflectionMethod $method) {
                return !$method->isPublic();
            });
            $nonePublicMethods = array_map(function (\ReflectionMethod $method){
                $modifier = '';
                if ($method->isPrivate())
                    $modifier = 'private';
                else
                    $modifier = 'protected';
                return $method->name.'() is '.$modifier;
            },$nonePublicMethods);
            $nonePublicMethodsCount = count($nonePublicMethods);
            $message = '';
            if ($nonePublicMethodsCount>0){
                if ($nonePublicMethodsCount==1)
                    $message = "method $nonePublicMethods[0]";
                else
                    $message = "methods ".implode(' , ',$nonePublicMethods).' ';
                $message.= "in $this->namespace should be public !!! ";
            }
            $this->assertEquals(0,$nonePublicMethodsCount,$message);
        }
        else
            $this->fail("no found any method in $this->namespace trait !!!");
    }
    public function test_should_no_have_static_method():void {
        $traitReflection = new \ReflectionClass($this->namespace);
        $methods = $traitReflection->getMethods();
        if (!empty($methods)){
            $staticMethods = array_filter($methods,function (\ReflectionMethod $method){
                return $method->isStatic();
            });
            $staticMethodsCount = sizeof($staticMethods);
            $message = '';
            if (!empty($staticMethods)) {
                if ($staticMethodsCount==1)
                    $message = "method $staticMethods[0]() ";
                else
                    $message = 'methods '.implode('() , ',$staticMethods).'() , ';
                $message .= "dont be static !!! in $this->namespace trait ";
            }
            $this->assertEquals(0,$staticMethodsCount,$message);
        }
        else
            $this->fail("no found any method in $this->namespace trait !!!");
    }
    public function test_should_no_have_final_method():void {
        $traitReflection = new \ReflectionClass($this->namespace);
        $methods = $traitReflection->getMethods();
        if (!empty($methods)){
            $finalMethods = array_filter($methods,function (\ReflectionMethod $method){
                return $method->isFinal();
            });
            $finalMethodsCount = count($finalMethods);
            $message = '' ;
            if ($finalMethodsCount>0){
                if ($finalMethodsCount==1)
                    $message = "method $finalMethods[0]() ";
                else
                    $message = "methods ".implode('() , ',$finalMethods).'() ,';
                $message .= " in trait $this->namespace dont be final !!! ";
            }
            $this->assertEmpty($finalMethods,$message);
        }
        else
            $this->fail("no found any method in $this->namespace trait !!!");
    }

    public function test_should_no_have_abstract_method():void {
        $traitReflection = new \ReflectionClass($this->namespace);
        $methods = $traitReflection->getMethods();
        if (!empty($methods)){
            $abstractMethods = array_filter($methods , function (\ReflectionMethod $method){
                return $method->isAbstract();
            });
            $abstractMethodsCount = count($abstractMethods);
            $message = '';
            if (!empty($abstractMethods)){
                if ($abstractMethodsCount==1)
                    $message = "method $abstractMethods[0]()";
                else
                    $message = "methods ".implode("() , ",$abstractMethods).'()';
                $message .= " in $this->namespace trait should dont be abstract !!!";
            }
            $this->assertEmpty($abstractMethods,$message);
        }
        else
            $this->fail("no found any method in $this->namespace trait !!!");
    }
}
