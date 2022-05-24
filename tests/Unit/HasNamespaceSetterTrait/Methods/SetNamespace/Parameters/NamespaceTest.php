<?php

namespace Tests\Unit\HasNamespaceSetterTrait\Methods\SetNamespace\Parameters;
use PHPUnit\Framework\TestCase;
use App\Traits\HasNamespaceSetterTrait;

class NamespaceTest extends TestCase
{
    protected string $namespace = HasNamespaceSetterTrait::class ;
    protected string $method = 'setNamespace';
    protected string $parameter = 'namespace';
    public function test_is_exist():void {
        $methodReflection = new \ReflectionMethod($this->namespace,$this->method);
        $parameters = $methodReflection->getParameters();
        $parameters = array_map(function (\ReflectionParameter $parameter){
            return $parameter->name;
        },$parameters);
        $isExist = in_array($this->parameter , $parameters);
        $this->assertTrue($isExist, "method $this->method() in $this->namespace no have parameter with name $this->parameter");
    }
}
