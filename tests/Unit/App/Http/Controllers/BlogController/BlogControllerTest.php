<?php

namespace Tests\Unit\App\Http\Controllers\BlogController;

use App\Contracts\BlogControllerInterface;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\Controller;
use PHPUnit\Framework\TestCase;

class BlogControllerTest extends TestCase
{
    protected string $namespace = BlogController::class ;
    public function test_is_exist():void {
        $isExist = class_exists($this->namespace);
        $this->assertTrue($isExist,"missing controller $this->namespace");
    }
    public function test_is_no_final():void {
        $reflection = new \ReflectionClass($this->namespace);
        $isNotFinal = !$reflection->isFinal();
        $this->assertTrue($isNotFinal,"controller $this->namespace dont be final !!!");
    }
    public function test_is_no_abstract():void {
        $reflection = new \ReflectionClass($this->namespace);
        $isNotAbstract = !$reflection->isAbstract();
        $this->assertTrue($isNotAbstract,"controller $this->namespace dont be abstract !!!");
    }
    public function test_should_extend_Controller():void {
        $parent = get_parent_class($this->namespace);
        $expect = Controller::class ;
        $message = "controller $this->namespace should extend from $expect";
        $this->assertEquals($parent,$expect,$message);
    }
    public function test_should_implement_interface():void {
        $parent = get_parent_class($this->namespace);
        $parentImplements = class_implements($parent);
        $selfImplements = class_implements($this->namespace);
        $diff = array_diff($selfImplements,$parentImplements);
        $diffCount = count($diff);
        $expect = 1 ;
        $this->assertEquals($expect,$diffCount,"controller $this->namespace should implement $expect interface but implement $diffCount interface !! ");
    }
    public function test_should_implement_BlogControllerInterface():void {
        $parent = get_parent_class($this->namespace);
        $parentImplements = class_implements($parent);
        $selfImplements = class_implements($this->namespace);
        $diff = array_diff($selfImplements,$parentImplements);
        $interface = BlogControllerInterface::class ;
        $isImplement = in_array($interface,$diff);
        $message = "$this->namespace controller should implement $interface interface !!!";
        $this->assertTrue($isImplement,$message);
    }
    public function test_cant_use_trait():void {
        $uses = class_uses($this->namespace);
        $this->assertEmpty($uses," controller $this->namespace dont be use trait !!!");
    }

    /*public function test_invoke_method_should_return_instance_of_View() :void {
       $this->assertInvokeMethodReturnViewInstance();
   }

   public function test_invoke_method_should_return_blog_view():void {
       $this->assertReturnedViewForInvokeMethodShouldIs('blog');
   }*/
}