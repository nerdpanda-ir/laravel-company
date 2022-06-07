<?php

namespace Tests\Unit\App\Http\Controllers\Api\V1\BlogPageApiController\Methods;

use App\Http\Controllers\Api\V1\BlogPageApiController;
use PHPUnit\Framework\TestCase;
use function PHPUnit\Framework\assertEquals;

class MethodsTest extends TestCase
{
    protected string $namespace = BlogPageApiController::class ;
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
        if ($methodsCount!=$expect){
            $message .= "$this->namespace controller ";
            $implodeMethods = '';
            if ($methodsCount>0){
                $methods = array_map(function (\ReflectionMethod $method){
                    return $method->name;
                },$methods);
                $implodeMethods .= '-> '.implode('(),',$methods).'()';
            }
            if ($methodsCount>$expect)
                $message.='more';
            else
                $message.='less';
            $message.=" than expected have private method !!!\n$this->namespace controller should have $expect private method but actually have $methodsCount private method $implodeMethods";
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
        if ($methodsCount!=$expect){
            $message .="$this->namespace controller ";
            $methodsImplode = '';
            if ($methodsCount>0){
                $methods = array_map(function (\ReflectionMethod $method){
                    return $method->name;
                },$methods);
                $methodsImplode .='-> '.implode('(), ',$methods).'()';
            }
            if ($methodsCount>$expect)
                $message .= 'more';
            else
                $message .= 'less';
            $message .= " than expected have  protected method !!!\n$this->namespace controller should have $expect protected method but actually have $methodsCount protected method $methodsImplode";
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
        if ($methodsCount != $expect){
            $message .= "$this->namespace controller ";
            $implodeMethods = '';
            if ($methodsCount>=1) {
                $methods = array_map(function (\ReflectionMethod $method){
                    return $method->name;
                },$methods);
                $implodeMethods .= '->'.implode('() , ',$methods).'()';
            }
            if ($methodsCount>$expect)
                $message.='more';
            else
                $message.='less';
            $message.=" than expect have method !!! $this->namespace controller should have $expect method but actually have $methodsCount $implodeMethods ".(($methodsCount<=1) ? 'method ' : 'methods');
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
        if ($expect!=$methodsCount){
            $message .= "$this->namespace controller ";
            $methodsImplode = '';
            if ($methodsCount>0){
                $methods = array_map(function (\ReflectionMethod $method){
                    return $method->name;
                },$methods);
                $methodsImplode .= ' -> '.implode('(), ',$methods).'()';
            }
            if ($methodsCount>$expect)
                $message .= 'more';
            else
                $message .= 'less';
            $message.=" than expected have static method !!!\n controller $this->namespace should have $expect static method but actually have $methodsCount static method $methodsImplode !!!";
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
        if ($expect!=$methodsCount){
            $message.="$this->namespace controller ";
            $methodsImplode = '';
            if ($methodsCount>0){
                $methods = array_map(function (\ReflectionMethod $method){
                    return $method->name;
                },$methods);
                $methodsImplode .= ' -> '.implode('(), ',$methods).'()';
            }
            if ($methodsCount>$expect)
                $message.='more';
            else
                $message.='less';
            $message.=" than expect have final method !!!\n$this->namespace controller should have $expect final method but actually have $methodsCount final method $methodsImplode !!!";
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
        if ($methodsCount!=$expect){
            $message.="$this->namespace controller ";
            $methodsImplode = '';
            if ($methodsCount>0){
                $methods = array_map(function (\ReflectionMethod $method){
                    return $method->name;
                },$methods);
                $methodsImplode .= '-> '.implode('(), ',$methods).'()';
            }
            if ($methodsCount>$expect)
                $message.='more';
            else
                $message.='less';
            $message.=" than expected have abstract method !!\n$this->namespace controller should have $expect abstract method but actually have $methodsCount abstract method $methodsImplode !!!";
        }
        $this->assertEquals($expect,$methodsCount,$message);
    }
}
