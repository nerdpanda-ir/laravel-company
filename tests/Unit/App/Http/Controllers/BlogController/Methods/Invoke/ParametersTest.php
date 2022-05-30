<?php

namespace Tests\Unit\App\Http\Controllers\BlogController\Methods\Invoke;

use PHPUnit\Framework\TestCase;
use App\Http\Controllers\BlogController;

class ParametersTest extends TestCase
{
    protected string $namespace = BlogController::class ;
    protected string $method = '__invoke';
    public function test_no_have_parameter():void{
        $reflection = new \ReflectionMethod($this->namespace , $this->method);
        $parametersCount = $reflection->getNumberOfParameters() ;
        $expect = 0 ;
        $this->assertEquals($expect , $parametersCount , "method $this->method() in $this->namespace controller should no have any parameter !!!");
    }
}
