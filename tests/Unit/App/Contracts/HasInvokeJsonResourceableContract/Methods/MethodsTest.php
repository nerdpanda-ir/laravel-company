<?php

namespace Tests\Unit\App\Contracts\HasInvokeJsonResourceableContract\Methods;

use PHPUnit\Framework\TestCase;
use App\Contracts\HasInvokeJsonResourceableContract;

class MethodsTest extends TestCase
{
    protected string $namespace = HasInvokeJsonResourceableContract::class ;
    public function test_should_have_1_method():void {
        $expect = 1 ;
        $reflection = new \ReflectionClass($this->namespace);
        $methods = $reflection->getMethods();
        $methods = array_filter($methods,function (\ReflectionMethod $method){
            return $method->getDeclaringClass()->name==$this->namespace;
        });
        $methodsCount = count($methods);
        $message = '' ;
        if ($expect!=$methodsCount){
            $message .="$this->namespace interface ";
            $methodsImplode = '';
            if (!empty($methods)){
                $methods = array_map(function (\ReflectionMethod $method){
                    return $method->name;
                },$methods);
                $methodsImplode = ' -> '.implode('(), ',$methods).'()';
            }
            if ($methodsCount>$expect)
                $message .='more';
            else
                $message.='less';
            $message.=" than expect have method\ninterface $this->namespace should have $expect method but have $methodsCount $methodsImplode method!!!";
        }
        $this->assertEquals($expect,$methodsCount,$message);
    }
    public function test_no_have_static_method():void {
        $expect = 0 ;
        $reflection = new \ReflectionClass($this->namespace);
        $staticMethods = $reflection->getMethods();
        $staticMethods = array_filter($staticMethods,function (\ReflectionMethod $method){
            $isStatic = $method->isStatic();
            $isInSelf = $method->getDeclaringClass()->name == $this->namespace;
            return $isStatic && $isInSelf ;
        });
        $staticMethodsCount = count($staticMethods);
        $message = '';
        if ($expect!=$staticMethodsCount){
            $staticMethodsImplode = '';
            if (!empty($staticMethods)){
                $staticMethods = array_map(function (\ReflectionMethod $method){
                    return $method->name;
                },$staticMethods);
                $staticMethodsImplode .=' -> '.implode('(), ',$staticMethods).'()';
            }
            $message .= "interface $this->namespace";
            if ($staticMethodsCount>$expect)
                $message .= "more";
            else
                $message .="less";
            $message .="than expect have static method \n$message should have $expect static method but have $staticMethodsCount $staticMethodsImplode";
        }
        $this->assertEquals($expect,$staticMethodsCount,$message);
    }
}
