<?php

namespace Tests\Unit\NamespaceableTrait\Methods\SetNamespace\Parameters;
use App\Traits\NamespaceableTrait;
use PHPUnit\Framework\TestCase;

class NamespaceTest extends TestCase
{
    protected string $namespace = NamespaceableTrait::class ;
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
    public function test_should_have_string_dataType():void {
        $parameterReflection = new \ReflectionParameter([$this->namespace,$this->method],$this->parameter);
        $expect = ['string'];
        sort($expect,SORT_STRING);
        $expect = implode('|',$expect);
        if ($parameterReflection->hasType()) {
            $types = (string) $parameterReflection->getType();
            $types = explode('|',$types);
            sort($types,SORT_STRING);
            $types = implode('|',$types);
            $this->assertEquals($expect,$types,"parameter $$this->parameter in $this->method() method from $this->namespace trait should have $expect dataType but is $types ");
        }
        else
            $this->fail("parameter $$this->parameter in method $this->method() from $this->namespace trait should have any type !!! currently no type hinted ");
    }
    public function test_no_have_default_value():void {
        $parameterReflection = new \ReflectionParameter([$this->namespace,$this->method],$this->parameter);
        $isNoHaveDefaultValue = !$parameterReflection->isDefaultValueAvailable();
        $this->assertTrue($isNoHaveDefaultValue,"parameter $$this->parameter from method $this->method() in $this->namespace trait should no have any value !!!");
    }
    public function test_cant_Be_nullalbe():void {
        $reflectionParameter = new \ReflectionParameter([$this->namespace,$this->method],$this->parameter);
        $cantNull = !$reflectionParameter->allowsNull();
        $this->assertTrue($cantNull,"parameter $$this->parameter in method $this->method() from $this->namespace trait cant nullable !!!");
    }
}
