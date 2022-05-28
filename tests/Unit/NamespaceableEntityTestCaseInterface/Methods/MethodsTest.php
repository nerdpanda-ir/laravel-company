<?php

namespace Tests\Unit\NamespaceableEntityTestCaseInterface\Methods;

use App\Contracts\HasNamespaceGetterInterface;
use App\Contracts\HasNamespaceSetterInterface;
use App\Contracts\Tests\NamespaceableEntityTestCaseInterface;
use PHPUnit\Framework\TestCase;

class MethodsTest extends TestCase
{
    protected string $namespace = NamespaceableEntityTestCaseInterface::class ;
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
    public function test_methods_in_HasNamespaceGetter_should_is_Abstract():void {
        $interfaceReflection = new \ReflectionClass($this->namespace);
        $methods = $interfaceReflection->getMethods();
        $noneAbstractMethods = [] ;
        foreach ($methods as $method)
            if ($method->class==HasNamespaceGetterInterface::class and !$method->isAbstract())
                $noneAbstractMethods[] = $method->name ;
        $noneAbstractMethodsCount = count($noneAbstractMethods);
        $message = '';
        if (!empty($noneAbstractMethods)){
            if ($noneAbstractMethodsCount==1)
                $message = 'method '.$noneAbstractMethods[0].'()';
            else
                $message .= 'methods '.implode('() , ',$noneAbstractMethods).'() ';
            $message .= ' in interface '.HasNamespaceGetterInterface::class .'should is abstract !!! ';
        }
        $this->assertEquals(0,$noneAbstractMethodsCount,$message);
    }

    public function test_should_have_one_method_from_HasNamespaceSetterInterface():void {
        $interfaceReflection = new \ReflectionClass($this->namespace);
        $methods = $interfaceReflection->getMethods() ;
        $parentMethods = [];
        foreach ($methods as $method)
            if ($method->class==HasNamespaceSetterInterface::class)
                $parentMethods [] = $method->name;
        $parentMethodsCount = count($parentMethods);
        $message = '';
        if ($parentMethodsCount==2)
            $message = "method $parentMethods[1]() ";
        else if ($parentMethodsCount>2)
        {
            array_shift($parentMethods);
            $message = "methods ".implode(' () , ',$parentMethods).'() ';
        }
        $message.='should remove !!! in '.HasNamespaceSetterInterface::class.'interface !!!';
        $this->assertEquals(1,$parentMethodsCount,$message);
    }

    public function test_methods_in_HasNamespaceSetterInterface_should_is_none_static():void {
        $interfaceReflection = new \ReflectionClass($this->namespace);
        $methods = $interfaceReflection->getMethods();
        $staticMethods = [];
        foreach ($methods as $method)
            if ($method->class==HasNamespaceSetterInterface::class and $method->isStatic())
                $staticMethods[] = $method->name ;
        $staticMethodsCount = count($staticMethods);
        $message = '';
        if (!empty($staticMethods)){
            if ($staticMethodsCount==1)
                $message = "method ".$staticMethods[0].' () ';
            else
                $message = "methods ".implode('() , ',$staticMethods).' () ';
            $message .= 'in '.HasNamespaceSetterInterface::class . 'should dont be static';
        }
        $this->assertEmpty($staticMethods,$message);
    }
    public function test_methods_in_HasNamespaceSetterInterface_is_not_final():void {
        $interfaceReflection = new \ReflectionClass($this->namespace);
        $methods = $interfaceReflection->getMethods() ;
        $finalMethods = array_filter($methods , function (\ReflectionMethod $method){
            return $method->isFinal() ;
        });
        $finalMethodsCount = sizeof($finalMethods);
        $message = '';
        if (!empty($finalMethods)){
            if ($finalMethodsCount==1)
                $message = 'method '.$finalMethods[0].'() ';
            else
                $message = 'methods '.implode(' () , ',$finalMethods).'() ';
            $message.= ' should is not final !!!';
        }
        $this->assertEmpty($finalMethods,$message);
    }
    public function test_methods_in_HasNamespaceSetterInterface_should_is_abstract():void {
        $interfaceReflection = new \ReflectionClass($this->namespace);
        $methods = $interfaceReflection->getMethods();
        $noneAbstractMethods = array_filter($methods,function (\ReflectionMethod $method ){
            return !$method->isAbstract();
        });
        $noneAbstractMethodsCount = sizeof($noneAbstractMethods);
        $message = '';
        if (!empty($noneAbstractMethods)) {
            if ($noneAbstractMethodsCount==1)
                $message = 'method '.$noneAbstractMethods[0].'() ';
            else
                $message = 'methods '.implode('() , ',$noneAbstractMethods).'() ';
            $message .= 'should is abstract  in interface '.HasNamespaceSetterInterface::class;
        }
        $this->assertEquals(0,$noneAbstractMethodsCount,$message);
    }
}
