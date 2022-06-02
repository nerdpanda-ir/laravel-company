<?php

namespace Tests\Unit\App\Contracts\BlogPageApiControllerInterface;

use PHPUnit\Framework\TestCase;
use App\Contracts\BlogPageApiControllerInterface;

class BlogPageApiControllerInterfaceTest extends TestCase
{
    protected string $namespace = BlogPageApiControllerInterface::class ;
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
}
