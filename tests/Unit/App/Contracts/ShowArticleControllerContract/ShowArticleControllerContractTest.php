<?php

namespace Tests\Unit\App\Contracts\ShowArticleControllerContract;

use App\Contracts\HasInvokeViewableContract;
use PHPUnit\Framework\TestCase;
use App\Contracts\ShowArticleControllerContract as Entity;

class ShowArticleControllerContractTest extends TestCase
{
    protected string $namespace = Entity::class ;
    public function test_is_exist():void {
        $isExist = interface_exists($this->namespace);
        $this->assertTrue($isExist,"missing $this->namespace interface !!");
    }
    public function test_should_extend_interface():void {
        $expect = 1 ;
        $classImplements = class_implements($this->namespace);
        $classImplementsCount = count($classImplements);
        $message = '';
        if ($classImplementsCount!=$expect){
            $message = "interface $this->namespace implement ";
            $interfaceImplode = '';
            if ($classImplementsCount>=1)
                $interfaceImplode ='-> '.implode(' , ',$classImplements);
            if ($classImplementsCount>$expect)
                $message.='more';
            else
                $message.='less';
            $message.=" than expect interfaces !!!\nshould implement $expect interface but implement $classImplementsCount interface $interfaceImplode";
        }
        $this->assertEquals($classImplementsCount,$expect,$message);
    }
    public function test_should_extend_HasInvokeViewableContract_interface():void {
        $classImplements = class_implements($this->namespace);
        $interface = HasInvokeViewableContract::class ;
        $isImplement = in_array($interface, $classImplements);
        $this->assertTrue($isImplement,"$this->namespace interface should implement $interface !!!");
    }
}
