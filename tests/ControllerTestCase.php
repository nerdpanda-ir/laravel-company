<?php namespace Tests ; ?>
<?php

use Illuminate\Contracts\View\View;

class ControllerTestCase extends TestCase {
    protected string $namespace;
    protected function namespace() :string {
        return $this->namespace;
    }
    public function test_controller_class_is_exist():void {
        $isExist = class_exists($this->namespace,true);
        $this->assertTrue(
            $isExist,
            'we not have this class -> '.$this->namespace()
        );
    }

    protected function controllerInstance(array $controllerArgs = []) :object {
        return $this->app->make($this->namespace,$controllerArgs);
    }

    protected function controllerHasMethod(string $method) :bool {
        return method_exists($this->namespace , $method) ;
    }

    protected function assertControllerHasMethod(
        string $method ,
        string $message = '' ,
    ):void {
        $methodIsExist = $this->controllerHasMethod($method);
        if (!$methodIsExist and strlen($message)==0)
            $message = $this->messageForMissingMethodInController($method);
        $this->assertTrue($methodIsExist , $message);
    }

    protected function messageForMissingMethodInController(
        string $method
    ):string {
        return " controller -> {$this->namespace} should have {$method}() method !!!  ";
    }

    protected function callStaticMethodFromController(string $method , array $methodArgs = [] ){
        return $this->app->call([$this->namespace,$method],$methodArgs);
    }

    protected function callNoneStaticMethodFromController(
        string $method ,
        array $methodArgs = [] ,
        array $controllerArgs = [] ,
    ){
        $controller = $this->controllerInstance($controllerArgs);
        return $this->app->call([$controller,$method],$methodArgs);
    }

    protected function callMethodFromController(
        bool $isStatic ,
        string $method ,
        array $methodArgs = [] ,
        array $controllerArgs = [] ,
    ){
        if ($isStatic)
            return $this->callStaticMethodFromController($method,$methodArgs);
        else
            return $this->callNoneStaticMethodFromController($method,$methodArgs,$controllerArgs);
    }

    protected function assertMethodInControllerReturnInstanceOf(
        string $expected ,
        bool $isStatic ,
        string $method ,
        array $methodArgs = [] ,
        array $controllerArgs = [] ,
        string $message = ''
    ):void {
        if ($isStatic)
            $this->assertStaticMethodInControllerReturnInstanceOf(
                $expected,$method,$methodArgs,$message
            );
        else
            $this->assertNoneStaticMethodInControllerReturnInstanceOf(
                $expected , $method , $methodArgs , $controllerArgs , $message
            );
    }

    protected function badTypeHintMessageForControllerMethod(
        string $method ,
        string $expected ,
    ):string {
        return " method {$method}() from class {$this->namespace} should return instance of {$expected} !!";
    }

    protected function assertStaticMethodInControllerReturnInstanceOf(
        string $expected ,
        string $method ,
        array $methodArgs = [] ,
        string $message = ''
    ) :void {
        $methodResult = $this->callStaticMethodFromController($method,$methodArgs);
        $this->whenMessageIsEmptyUseControllerMethodBadReturnTypeDefaultMessage(
            $message , $method , $expected
        );
        $this->assertInstanceOf($expected , $methodResult , $message );
    }

    protected function assertNoneStaticMethodInControllerReturnInstanceOf(
        string $expected ,
        string $method ,
        array $methodArgs = [] ,
        array $controllerArgs = [] ,
        string $message = ''
    ):void {
        $methodResult = $this->callNoneStaticMethodFromController($method,$methodArgs,$controllerArgs);
        $this->whenMessageIsEmptyUseControllerMethodBadReturnTypeDefaultMessage(
            $message , $method , $expected
        );
        $this->assertInstanceOf($expected,$methodResult,$message);
    }

    protected function whenMessageIsEmptyUseControllerMethodBadReturnTypeDefaultMessage(
        string &$message ,
        string $method ,
        string $expected
    ):void {
        if (strlen($message)==0)
            $message = $this->badTypeHintMessageForControllerMethod($method , $expected);
    }

    protected function assertStaticMethodInControllerReturnViewInstance(
        string $method , array $methodArgs = [] , string $message = '' ,
    ):void {
        $this->assertStaticMethodInControllerReturnInstanceOf(
            View::class , $method , $methodArgs , $message
        );
    }


    protected function assertNoneStaticMethodInControllerReturnViewInstance(
        string $method , array $methodArgs = [] ,
        array $controllerArgs = [] , string $message = '' ,
    ):void {
        $this->assertNoneStaticMethodInControllerReturnInstanceOf(
            View::class , $method , $methodArgs , $controllerArgs , $message
        );
    }

}
