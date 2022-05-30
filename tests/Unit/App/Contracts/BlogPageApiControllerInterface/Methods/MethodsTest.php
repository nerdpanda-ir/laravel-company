<?php

namespace Tests\Unit\App\Contracts\BlogPageApiControllerInterface\Methods;

use PHPUnit\Framework\TestCase;
use App\Contracts\BlogPageApiControllerInterface;

class MethodsTest extends TestCase
{
    protected string $namespace = BlogPageApiControllerInterface::class ;    public function test_no_have_method():void {
        $reflection = new \ReflectionClass($this->namespace);
        $methods = $reflection->getMethods() ;
        $methods = array_filter(
            $methods ,
            function (\ReflectionMethod $method){
                return $method->getDeclaringClass()->name == $this->namespace;
            }
        );
        $message = '';
        if (!empty($methods)){
            $message .= "interface $this->namespace should no have any method ";
            $methods = array_map(
                function (\ReflectionMethod $method){
                    return $method->name;
                } , $methods );
            $message.="but have ".implode('() , ',$methods).'()';
        }
        $this->assertEmpty($methods,$message);

    }
}
