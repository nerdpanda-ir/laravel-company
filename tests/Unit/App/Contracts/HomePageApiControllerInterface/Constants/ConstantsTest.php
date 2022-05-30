<?php

namespace Tests\Unit\App\Contracts\HomePageApiControllerInterface\Constants;

use PHPUnit\Framework\TestCase;
use App\Contracts\HomePageApiControllerInterface;

class ConstantsTest extends TestCase
{
    protected string $namespace = HomePageApiControllerInterface::class ;
    public function test_no_have_constants():void {
        $reflection = new \ReflectionClass($this->namespace);
        $constants = $reflection->getReflectionConstants();
        $constants = array_filter($constants , function (\ReflectionClassConstant $constant){
            return $constant->getDeclaringClass()->name==$this->namespace;
        });
        $constantsCount = count($constants);
        $expect = 0 ;
        $message = '';
        if ($constantsCount!=$expect){
            $message .= "constraints in $this->namespace Interface ";
            if ($constantsCount>0)
                $constants = array_map(
                    function (\ReflectionClassConstant $constant){
                        return $constant->name;
                    }, $constants);
            if ($constantsCount>$expect)
                $message.="more than expected";
            else
                $message.="less than expected";
            $message.="\nexpect interface $this->namespace have $expect constants but have $constantsCount constants ".(($constantsCount>0) ? ' : ': '').implode(' , ',$constants)." !!!";
        }
        $this->assertEquals($expect,$constantsCount,$message);
    }
}
