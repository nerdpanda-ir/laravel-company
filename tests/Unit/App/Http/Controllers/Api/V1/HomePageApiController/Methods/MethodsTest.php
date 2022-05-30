<?php

namespace Tests\Unit\App\Http\Controllers\Api\V1\HomePageApiController\Methods;

use PHPUnit\Framework\TestCase;
use App\Http\Controllers\Api\V1\HomePageApiController;
use function PHPUnit\Framework\assertEquals;

class MethodsTest extends TestCase
{
    protected string $namespace = HomePageApiController::class ;
    public function test_no_have_private_methods():void {
        $reflection = new \ReflectionClass($this->namespace);
        $methods = $reflection->getMethods();
        $methods = array_filter($methods,function (\ReflectionMethod $method){
            $isSelfMethod = $method->getDeclaringClass()->name==$this->namespace ;
            $isPrivate = $method->isPrivate();
            return $isSelfMethod && $isPrivate;
        });
        $methodsCount = count($methods);
        $expect = 0 ;
        $message = '' ;
        if ($methodsCount>$expect){
            $methods = array_map(function (\ReflectionMethod $method){
                return $method->name;
            },$methods);
            if ($methodsCount==1)
                $message = "method $methods[0]() is private ";
            else
                $message = "methods ".implode('(), ',$methods)."() is private ";
            $message.=" !!! controller $this->namespace cant be have private method !!!";
        }
        $this->assertEquals($expect,$methodsCount,$message);
    }
    public function test_no_have_protected_methods():void {
        $reflection = new \ReflectionClass($this->namespace);
        $methods = $reflection->getMethods();
        $methods = array_filter($methods,function (\ReflectionMethod $method){
            $isInSelf = $method->getDeclaringClass()->name == $this->namespace ;
            $isProtected = $method->isProtected();
            return $isInSelf && $isProtected;
        });
        $expect = 0 ;
        $methodsCount = count($methods);
        $message = '';
        if ($methodsCount>0){
            $methods = array_map(function (\ReflectionMethod $method){
                return $method->name;
            },$methods);
            if ($methodsCount==1)
                $message = " method $methods[0]() ";
            else
                $message = " methods ".implode("() , ",$methods)."() ";
            $message .= "is protected !!! $this->namespace controller cant be have protected method !!!";
        }
        assertEquals($expect,$methodsCount,$message);
    }
    public function test_should_have_1_public_method():void {
        $reflection = new \ReflectionClass($this->namespace);
        $methods = $reflection->getMethods();
        $methods = array_filter($methods,function (\ReflectionMethod $method){
            $isInSelf = $method->getDeclaringClass()->name == $this->namespace ;
            $isPublic = $method->isPublic();
            return $isInSelf && $isPublic;
        });
        $methodsCount = count($methods);
        $expect = 1 ;
        $message = '';
        if ($methodsCount>1){
            $methods = array_map(function (\ReflectionMethod $method){
                return $method->name;
            },$methods);
            $message = "methods ".implode('() , ',$methods)."() in controller $this->namespace is public !!!\n$this->namespace controller  should have just $expect public method ";
        }
        $this->assertEquals($expect,$methodsCount,$message);
    }

    public function test_no_have_static_method():void {
        $reflection = new \ReflectionClass($this->namespace);
        $methods = $reflection->getMethods();
        $methods = array_filter($methods,function (\ReflectionMethod $method){
            $isInSelf = $method->getDeclaringClass()->name == $this->namespace ;
            $isStatic = $method->isStatic() ;
            return $isInSelf && $isStatic ;
        });
        $methodsCount = count($methods);
        $expect = 0 ;
        $message = '';
        if (!empty($methods)){
            $methods = array_map(function (\ReflectionMethod $method){
                return $method->name;
            },$methods);
            if ($methodsCount==1)
                $message = "method $methods[0]()";
            else
                $message = "methods ".implode('() , ',$methods)."()";
            $message.=" in controller $this->namespace is static !!!\n controller $this->namespace dont be have static method !!";
        }
        $this->assertEquals($expect,$methodsCount,$message);
    }

    public function test_no_have_final_method():void {
        $reflection = new \ReflectionClass($this->namespace);
        $methods = $reflection->getMethods();
        $methods = array_filter($methods , function (\ReflectionMethod $method){
            $isInSelf = $method->getDeclaringClass()->name == $this->namespace ;
            $isFinal = $method->isFinal();
            return $isInSelf && $isFinal ;
        });
        $methodsCount = count($methods);
        $expect = 0 ;
        $message = '';
        if (!empty($methods)) {
            $methods = array_map(function (\ReflectionMethod $method){
                return $method->name;
            },$methods);
            if ($methodsCount==1)
                $message = "method $methods[0]()";
            else
                $message = "methods ".implode('() , ',$methods)."()";
            $message.=" in controller $this->namespace is final !!!\ncontroller $this->namespace cant be have final method !!";
        }
        $this->assertEquals($expect,$methodsCount,$message);
    }

    public function test_no_have_abstract_method():void{
        $reflection = new \ReflectionClass($this->namespace);
        $methods = $reflection->getMethods();
        $methods = array_filter($methods , function (\ReflectionMethod $method ){
            $isInSelf = $method->getDeclaringClass()->name == $this->namespace;
            $isAbstract = $method->isAbstract();
            return $isInSelf && $isAbstract ;
        });
        $methodsCount = count($methods);
        $expect = 0;
        $message = '';
        if ($methodsCount>$expect){
            $methods = array_map(function (\ReflectionMethod $method){
                return $method->name;
            },$methods);
            $message = "abstract method in controller $this->namespace is more than expect \n\t\t\t".implode('(), ',$methods)."() is abstract\nbut expect $this->namespace controller have $expect abstract method but have $methodsCount abstract method !!!\n";
        }
        $this->assertEquals($expect,$methodsCount,$message);
    }
}
