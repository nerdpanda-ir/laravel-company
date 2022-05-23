<?php

namespace Tests\Unit\HasNamespaceGetterTraitTest;

use PHPUnit\Framework\TestCase;
use App\Traits\HasNamespaceGetterTrait;

class MethodsTest extends TestCase
{
    protected string $namespace = HasNamespaceGetterTrait::class;
    public function test_should_have_one_method():void {
        $traitReflection = new \ReflectionClass($this->namespace);
        $methods = $traitReflection->getMethods();
        $methodsCount = sizeof($methods);
        $expect = 1 ;
        $this->assertEquals($expect,$methodsCount,"$this->namespace trait should have just one method ");
    }
    public function test_should_no_have_static_method():void {
        $traitReflection = new \ReflectionClass($this->namespace);
        $methods = $traitReflection->getMethods();
        $staticMethods = array_filter($methods,function (\ReflectionMethod $method){
            return $method->isStatic();
        });
        $staticMethods[] = 'ez';
        $staticMethods[] = 'gg';
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
}
