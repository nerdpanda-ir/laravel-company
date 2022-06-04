<?php

namespace Tests\Unit\App\Contracts\HasIndexJsonResourceableContract\Methods\Index;

use PHPUnit\Framework\TestCase;
use App\Contracts\HasIndexJsonResourceableContract as Entity;
use Illuminate\Http\Resources\Json\JsonResource;

class IndexTest extends TestCase
{
    protected string $namespace = Entity::class ;
    protected string $method = 'index';
    public function test_is_exist():void {
        $isExist = method_exists($this->namespace,$this->method);
        $this->assertTrue($isExist,"missing $this->method() in  $this->namespace interface");
    }
    public function test_dont_be_static():void {
        $reflection = new \ReflectionMethod($this->namespace , $this->method);
        $isNotStatic = !$reflection->isStatic();
        $this->assertTrue($isNotStatic,"$this->method() method in $this->namespace interface dont be static !!!");
    }
    public function test_should_is_typeHinted():void {
        $reflection = new \ReflectionMethod($this->namespace , $this->method);
        $hasReturnType = $reflection->hasReturnType();
        $this->assertTrue($hasReturnType,"method $this->method in $this->namespace interface should has return type !!!");
    }
    public function test_should_typeHint_is_JsonResource():void {
        $expects = [JsonResource::class];
        sort($expects,SORT_STRING);
        $expects = implode('|',$expects);

        $reflection = new \ReflectionMethod($this->namespace , $this->method);

        $returnTypes = (string)$reflection->getReturnType();
        $returnTypes = explode('|',$returnTypes);
        sort($returnTypes,SORT_STRING);
        $returnTypes = implode('|',$returnTypes);

        $this->assertEquals($expects,$returnTypes,"typeHint for method $this->method() in interface $this->namespace should is $expects but is $returnTypes ");
    }

}
