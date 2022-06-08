<?php

namespace Tests\Unit\App\Contracts\ShowArticleControllerContract\Methods;

use PHPUnit\Framework\TestCase;
use App\Contracts\ShowArticleControllerContract as Entity;

class MethodsTest extends TestCase
{
    protected string $namespace = Entity::class ;
    public function test_no_have_method():void {
        $reflection = new \ReflectionClass($this->namespace);
        $methods = $reflection->getMethods() ;
        $methods = array_filter(
            $methods ,
            function (\ReflectionMethod $method){
                return $method->getDeclaringClass()->name == $this->namespace;
            }
        );
        $methodsCount = count($methods);
        $message = '';
        $expect = 0 ;
        if ($methodsCount!=$expect){
            $message = "$this->namespace interface ";
            $implodeMethods = '';
            if ($methodsCount>0){
                $methods = array_map(function (\ReflectionMethod $method){
                    return $method->name;
                },$methods);
                $implodeMethods = ' -> '.implode('() , ',$methods).'()';
            }
            if ($methodsCount>$expect)
                $message.='more';
            else
                $message .='less';
            $message.=" than expect have method !!!\n$this->namespace interface should have $expect method but actually have $methodsCount method  $implodeMethods !!!";
        }
        $this->assertEquals($expect,$methodsCount,$message);
    }
}
