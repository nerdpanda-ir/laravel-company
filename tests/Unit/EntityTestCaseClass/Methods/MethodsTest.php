<?php

namespace Tests\Unit\EntityTestCaseClass\Methods;

use App\Traits\HasNamespaceGetterTrait;
use PHPUnit\Framework\TestCase;
use Tests\EntityTestCase;

class MethodsTest extends TestCase
{
    protected string $namespace = EntityTestCase::class ;
    public function test_no_have_method_in_self():void {
        $classReflection = new \ReflectionClass($this->namespace);
        $methods = $classReflection->getMethods();
        $selfMethods = [] ;
        foreach ($methods as $method)
            if ($method->class==$this->namespace)
                $selfMethods[] = $method->name.'()';
        $selfMethodsCount = count($selfMethods);
        $message = '';
        if (!empty($selfMethods)) {
            if ($selfMethodsCount==1)
                $message = "method $selfMethods[0] " ;
            else
                $message = "methods ".implode(', ',$selfMethods) ;
            $message .= " should remove from $this->namespace . " ;
        }
        $this->assertEmpty($selfMethods,$message);
    }
    public function test_should_have_double_method_from_use_traits():void {
        $classReflection = new \ReflectionClass($this->namespace);
        $methods = $classReflection->getMethods();
        $uses = class_uses($this->namespace);
        $counter = 0 ;
        foreach ($methods as $method)
            if (in_array($method->class,$uses))
                $counter++;
        $this->assertEquals(2,$counter,"$this->namespace class should have two method from used traits !!! ");
    }
    public function test_should_have_one_method_from_HasNamespaceGetterTrait():void {
        $classReflection = new \ReflectionClass($this->namespace);
        $methods = $classReflection->getMethods();
        $counter = 0 ;
        foreach ($methods as $method)
            if ($method->class==HasNamespaceGetterTrait::class)
                $counter++;
        $this->assertEquals(1,$counter,"$this->namespace class should just have one method from trait ".HasNamespaceGetterTrait::class);
    }
    public function test_methods_from_HasNamespaceGetterTrait_should_is_public(){
        $reflectionClass = new \ReflectionClass($this->namespace);
        $methods = $reflectionClass->getMethods();
        $traitMethods = array_filter($methods,function (\ReflectionMethod $method){
            return $method->class==HasNamespaceGetterTrait::class;
        });
        if (!empty($traitMethods)){
            $nonePublicTraitMethods = array_filter($traitMethods,function (\ReflectionMethod $method){
                return !$method->isPublic();
            });
            $nonePublicTraitMethods = array_map(function (\ReflectionMethod $method) {
                return $method->name.'()';
            },$nonePublicTraitMethods);
            $nonePublicTraitMethodsCount = count($nonePublicTraitMethods);
            $message = '';
            if (!empty($nonePublicTraitMethods)){
                if ($nonePublicTraitMethodsCount==1)
                    $message = " method $nonePublicTraitMethods[0] ";
                else
                    $message = 'methods '.implode(', ',$nonePublicTraitMethods);
                $message .= ' in trait '.HasNamespaceGetterTrait::class .'should is public !!!';
            }
            $this->assertEmpty($nonePublicTraitMethods,$message);
        }
        else
            $this->fail("no found any methods in use trait ".HasNamespaceGetterTrait::class." in class $this->namespace");
    }
    public function test_methods_from_HasNamespaceGetter_should_is_no_static():void {
        $classReflection = new \ReflectionClass($this->namespace);
        $methods = $classReflection->getMethods();
        $traitMethods = array_filter($methods,function (\ReflectionMethod $method){
            return $method->class == HasNamespaceGetterTrait::class;
        });
        if (!empty($traitMethods)){
            $staticMethods = array_filter($traitMethods , function (\ReflectionMethod $method){
                return $method->isStatic();
            });
            $staticMethods = array_map(function (\ReflectionMethod $method){
                return $method->name.'() ';
            },$staticMethods);
            $staticCount = count($staticMethods);
            $message = '';
            if ($staticCount>0){
                if ($staticCount==1)
                    $message ="method $staticMethods[0]";
                else
                    $message ="methods ".implode(', ',$staticMethods);
                $message.="in used trait ".HasNamespaceGetterTrait::class." in $this->namespace class dont be static ";
            }
            $this->assertEmpty($staticMethods,$message);
        }
        else
            $this->fail("no found any methods in use trait ".HasNamespaceGetterTrait::class . " in class $this->namespace ");
    }
    public function test_methods_in_HasNamespaceGetterTrait_should_no_final():void {
        $classReflection = new \ReflectionClass($this->namespace);
        $methods = $classReflection->getMethods();
        $traitMethods = array_filter($methods,function (\ReflectionMethod $method){
            return $method->class==HasNamespaceGetterTrait::class;
        });
        if (!empty($traitMethods)){
            $finalMethods = array_filter($traitMethods,function (\ReflectionMethod $method){
                return $method->isFinal();
            });
            $message = '';
            if (!empty($finalMethods)){
                $finalMethods = array_map(function (\ReflectionMethod $method){
                    return $method->name.'()';
                },$finalMethods);
                $finalMethodsCount = count($finalMethods);
                if ($finalMethodsCount==1)
                    $message = "method $finalMethods[0]";
                else
                    $message = "methods ".implode(' , ',$finalMethods).' ';
                $message .="in used trait".HasNamespaceGetterTrait::class . " in $this->namespace class dont be final !!!";
            }
            $this->assertEmpty($finalMethods,$message);
        }
        else
            $this->fail("no found any method in use trait ".HasNamespaceGetterTrait::class . " in class $this->namespace ");
    }
    public function test_methods_in_HasNamespaceGetterTrait_should_no_abstract():void {
        $reflectionClass = new \ReflectionClass($this->namespace);
        $methods = $reflectionClass->getMethods();
        $traitMethods = array_filter($methods , function (\ReflectionMethod $method){
            return $method->class==HasNamespaceGetterTrait::class ;
        });
        if (!empty($traitMethods)){
            $abstractMethods = [] ;
            foreach ($traitMethods as $traitMethod)
                if ($traitMethod->isAbstract())
                    $abstractMethods[] = $traitMethod->name.'()';
            $message = '';
            if (!empty($abstractMethods)){
                $abstractMethodsCount = count($abstractMethods);
                if ($abstractMethodsCount==1)
                    $message = "method $abstractMethods[0] " ;
                else
                    $message = "methods ".implode(' , ',$abstractMethods) ;
                $message .= "in used trait".HasNamespaceGetterTrait::class . " in $this->namespace class dont be abstract !!!";
            }
            $this->assertEmpty($abstractMethods,$message);
        }
        else
            $this->fail(" no found any method in used trait ".HasNamespaceGetterTrait::class ." in $this->namespace class !!!");
    }
}
