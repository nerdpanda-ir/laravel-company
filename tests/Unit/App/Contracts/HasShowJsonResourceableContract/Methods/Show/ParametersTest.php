<?php

namespace Tests\Unit\App\Contracts\HasShowJsonResourceableContract\Methods\Invoke;

use PHPUnit\Framework\TestCase;
use App\Contracts\HasShowJsonResourceableContract as Entity;

class ParametersTest extends TestCase
{
    protected string $namespace = Entity::class ;
    protected string $method = 'show';
    public function test_no_have_parameter():void{
        $reflection = new \ReflectionMethod($this->namespace , $this->method);
        $parametersCount = $reflection->getNumberOfParameters() ;
        $expect = 0 ;
        $this->assertEquals($expect , $parametersCount , "method $this->method() in $this->namespace interface should no have any parameter !!!");
    }
}