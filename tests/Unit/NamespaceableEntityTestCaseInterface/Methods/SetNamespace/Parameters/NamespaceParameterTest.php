<?php

namespace Tests\Unit\NamespaceableEntityTestCaseInterface\Methods\SetNamespace\Parameters;
//@todo create method for test parameter position

use PHPUnit\Framework\TestCase;
use App\Contracts\Tests\NamespaceableEntityTestCaseInterface;

class NamespaceParameterTest extends TestCase
{
    protected string $namespace = EntityTestCaseInterface::class ;
    protected string $method = 'setNamespace';
    protected string $parameter = 'namespace';
    //@todo create method parameter test class , parametr position check , parameter count , parameter type check
    public function test_parameter_is_exist(): void
    {
        $methodReflection = new \ReflectionMethod($this->namespace, $this->method);
        $parameters = [];
        foreach ($methodReflection->getParameters() as $parameter)
            $parameters[] = $parameter->name;
        $exist = in_array($this->parameter, $parameters);
        $this->assertTrue($exist, "method => $this->method () from interface => $this->namespace should have \$$this->parameter");
    }
    public function test_parameter_data_type_should_is_string():void {
        // strict check , normal check -> (in array )
        //this is strict check !!!
        $methodReflection = new \ReflectionMethod($this->namespace,$this->method);
        $parameters = $methodReflection->getParameters();
        //@todo create custom method reflection service -> extend from main  method reflection class an create method for get parameters with datatype !!!
        $parametersWithTypes = [] ;
        $expect = ['string'];
        sort($expect,SORT_STRING);
        foreach ($parameters as $parameter)
            if ($parameter->hasType())
                $parametersWithTypes[$parameter->name] = explode('|',(string)$parameter->getType());
            else
                $parametersWithTypes[$parameter->name] = null ;
        if (array_key_exists($this->parameter,$parametersWithTypes))  {
            $parameterDataTypes = $parametersWithTypes[$this->parameter] ;
            if (is_array($parameterDataTypes)) {
                sort($parameterDataTypes,SORT_STRING);
                $this->assertEquals(
                    //@every body -> god help me to implement this !!!
                    implode('|',$expect) ,
                    implode('|',$parameterDataTypes) ,
                );
            }
            else if (is_null($parameterDataTypes))
                $this->fail("parameter $$this->parameter in method $this->method() should is ".implode('|',$expect).' !!! but no typehinted !!!');
        }
        else
            $this->fail("in method : $this->method() doesnt exist $$this->parameter parameter !!!");
    }
}
