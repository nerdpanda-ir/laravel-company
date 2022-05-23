<?php

namespace Tests\Unit\NamespaceableInterface;

use App\Contracts\HasNamespaceGetterInterface;
use PHPUnit\Framework\TestCase;
use App\Contracts\NamespaceableInterface ;

class MethodsTest extends TestCase
{
    protected string $namespace = NamespaceableInterface::class ;
    public function test_should_no_have_method():void {
        $interfaceReflection = new \ReflectionClass($this->namespace);
        $methods = $interfaceReflection->getMethods();
        $interfaceMethods = [];
        foreach ($methods as $method)
            if ($method->class==$this->namespace)
                $interfaceMethods[] = $method ;
        $interfaceMethodsCount = count($interfaceMethods);
        $this->assertEquals(
            0 , $interfaceMethodsCount ,
            "$this->namespace should no declare method !!! "
        );
    }

    public function test_should_have_two_method_from_parents():void {
        $parents = class_implements($this->namespace);
        $interfaceReflection = new \ReflectionClass($this->namespace);
        $methods = $interfaceReflection->getMethods() ;
        $counter = 0 ;
        foreach ($methods as $method)
            if (in_array($method->class,$parents))
                $counter++;
        $this->assertEquals(
            2,$counter ,
            "$this->namespace should have two method from parent "
        );
    }
    public function test_should_have_one_method_from_HasNamespaceGetterInterface():void {
        $interfaceReflection = new \ReflectionClass($this->namespace);
        $methods = $interfaceReflection->getMethods();
        $counter = 0 ;
        foreach ($methods as $method)
            if ($method->class==HasNamespaceGetterInterface::class)
                $counter++;
        $this->assertEquals(
            1,$counter,
            "interface $this->namespace should only have one method from ".HasNamespaceGetterInterface::class.' interface'
        );
    }
    public function test_methods_in_HasNamespaceGetterInterface_should_is_not_static():void
    {
        //@todo fail if one method in interface is static !!!! add expect when happen this
        $expect = [];
        $interfaceReflection = new \ReflectionClass($this->namespace);
        $methods = $interfaceReflection->getMethods();
        $staticMethods = [];
        foreach ($methods as $method)
            if ($method->class==HasNamespaceGetterInterface::class and $method->isStatic() and !in_array($method->name,$expect))
                $staticMethods[] = $method->name;
        $staticMethodsCount = count($staticMethods);
        $message = '';
        if (!empty($staticMethods)){
            if ($staticMethodsCount==1)
                $message = 'method '.$staticMethods[0].'() ';
            else
                $message = 'methods '.implode('() , ',$staticMethods).' () ';
            $message.=" from interface ".HasNamespaceGetterInterface::class.' dont be static !!!';
        }
        $this->assertEmpty($staticMethods,$message);
    }
    public function test_methods_in_HasNamespaceGetterInterface_never_is_final():void {
        $interfaceReflection = new \ReflectionClass($this->namespace);
        $methods = $interfaceReflection->getMethods();
        $finalMethods = [] ;
        foreach ($methods as $method)
            if ($method->isFinal() and $method->class==HasNamespaceGetterInterface::class)
                $finalMethods[] = $method->name;
        $message = '';
        $finalMethodsCount = count($finalMethods);
        if (!empty($finalMethods)){
            if ($finalMethodsCount==1)
                $message = 'method '.$finalMethods[0].' () ';
            else
                $message = 'methods '.implode(' () , ',$finalMethods).' () ';
            $message .= 'in interface '.HasNamespaceGetterInterface::class.' should is not final !!!';
        }
        $this->assertEmpty( $finalMethods, $message );

    }
    //@todo is not static , is not final , is abstract
}
