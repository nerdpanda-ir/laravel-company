<?php

namespace Tests\Unit\App\Contracts\HasInvokeJsonResourceableContract\Constants;

use PHPUnit\Framework\TestCase;
use App\Contracts\HasInvokeJsonResourceableContract;

class ConstantsTest extends TestCase
{
    protected string $namespace = HasInvokeJsonResourceableContract::class ;
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
            $implodeConstants = '';
            if ($constantsCount>0){
                $constants = array_map(
                    function (\ReflectionClassConstant $constant){
                        return $constant->name;
                    }, $constants);
                $implodeConstants .=' : '.implode(' , ',$constants);
            }
            if ($constantsCount>$expect)
                $message.="more than expected";
            else
                $message.="less than expected";
            $message.="\nexpect interface $this->namespace have $expect constants but have $constantsCount constants $implodeConstants !!!";
        }
        $this->assertEquals($expect,$constantsCount,$message);
    }
}
