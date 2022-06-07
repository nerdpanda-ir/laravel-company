<?php

namespace Tests\Unit\App\Http\Controllers\ShowArticleController\Methods\Invoke;

use App\Http\Controllers\ShowArticleController;
use PHPUnit\Framework\TestCase;

class ParametersTest extends TestCase
{
    protected string $namespace = ShowArticleController::class ;
    protected string $method = '__invoke';
    public function test_no_have_parameter():void{
        $reflection = new \ReflectionMethod($this->namespace , $this->method);
        $parameters = $reflection->getParameters();
        $parametersCount = $reflection->getNumberOfParameters() ;
        $expect = 0 ;
        $message = '';
        if ($parametersCount!=$expect) {
            $message .="$this->method() method in $this->namespace controller have ";
            $implodeParameters='';
            if ($parametersCount>0){
                $parameters = array_map(function (\ReflectionParameter $parameter){
                    return $parameter->getType().' $'.$parameter->name;
                },$parameters);
                $implodeParameters.='-> '.implode(' , ',$parameters);
            }
            if ($parametersCount>$expect)
                $message.='more';
            else
                $message.='less';
            $message.=" than expected parameter\nmethod $this->method() should have $expect parameter but actually have $parametersCount parameter $implodeParameters";
        }
        $this->assertEquals($expect , $parametersCount , $message);
    }
}
