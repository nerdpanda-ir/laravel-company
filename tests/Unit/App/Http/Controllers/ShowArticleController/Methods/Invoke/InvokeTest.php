<?php

namespace Tests\Unit\App\Http\Controllers\ShowArticleController\Methods\Invoke;

use PHPUnit\Framework\TestCase;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\ShowArticleController;
use Tests\CreatesApplication;

class InvokeTest extends TestCase
{
    use CreatesApplication;
    protected string $namespace = ShowArticleController::class ;
    protected string $method = '__invoke';
    public function test_is_exist():void {
        $isExist = method_exists($this->namespace,$this->method);
        $this->assertTrue($isExist,"missing $this->method() in  $this->namespace controller");
    }
    public function test_is_public():void {
        $reflection = new \ReflectionMethod($this->namespace , $this->method);
        $isPublic = $reflection->isPublic();
        $this->assertTrue($isPublic,"$this->method() method in $this->namespace controller should be public !!!");
    }
    public function test_dont_be_static():void {
        $reflection = new \ReflectionMethod($this->namespace , $this->method);
        $isNotStatic = !$reflection->isStatic();
        $this->assertTrue($isNotStatic,"$this->method() method in $this->namespace controller dont be static !!!");
    }
    public function test_dont_be_final():void {
        $reflection = new \ReflectionMethod($this->namespace , $this->method);
        $isNotFinal = !$reflection->isFinal();
        $this->assertTrue($isNotFinal,"$this->method() method in $this->namespace controller dont be Final !!!");
    }
    public function test_dont_be_abstract():void {
        $reflection = new \ReflectionMethod($this->namespace , $this->method);
        $isNotAbstract = !$reflection->isAbstract();
        $this->assertTrue($isNotAbstract,"$this->method() method in $this->namespace controller dont be Abstract !!!");
    }
    public function test_should_is_typeHinted():void {
        $reflection = new \ReflectionMethod($this->namespace , $this->method);
        $hasReturnType = $reflection->hasReturnType();
        $this->assertTrue($hasReturnType,"method $this->method in $this->namespace controller should has return type !!!");
    }
    public function test_should_typeHint_is_View():void {
        $expects = [View::class];
        sort($expects,SORT_STRING);
        $expects = implode('|',$expects);

        $reflection = new \ReflectionMethod($this->namespace , $this->method);

        $returnTypes = (string)$reflection->getReturnType();
        $returnTypes = explode('|',$returnTypes);
        sort($returnTypes,SORT_STRING);
        $returnTypes = implode('|',$returnTypes);

        $this->assertEquals($expects,$returnTypes,"typeHint for method $this->method() in controller $this->namespace should is $expects but is $returnTypes ");
    }
    public function test_should_return_ViewInstance():void {
        $this->createApplication();
        $controller = app()->make($this->namespace);
        $method = app()->call([$controller,$this->method]);
        $expect = View::class ;
        $this->assertInstanceOf($expect , $method , "method $this->method() from $this->namespace controller should return instance of $expect !!!");
    }
    public function test_view_name_in_returned_view_should_is_blogDetails():void {
        $controller = app()->make($this->namespace);
        /** @var View $method*/
        $method = app()->call([$controller,$this->method]);
        $expect = 'blog-details';
        $actual = $method->name() ;
        $this->assertEquals($expect,$actual,"method $this->method() in $this->namespace controller should return $expect view but return $actual view !!! ");
    }
}
