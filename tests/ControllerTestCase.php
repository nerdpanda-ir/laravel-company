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
        string $method ,
        ...$parameters
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
        ...$parameters
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

    protected function assertMethodInControllerReturnViewInstance(
        bool $isStatic ,  string $method ,  array $methodArgs = [] ,
        array $controllerArgs = [] , string $message = ''
    ):void {
        if ($isStatic)
            $this->assertStaticMethodInControllerReturnViewInstance( $method , $methodArgs , $message );
        else
            $this->assertNoneStaticMethodInControllerReturnViewInstance(
                $method , $methodArgs ,$controllerArgs , $message
            );
    }

    protected function assertReturnedViewForStaticMethodInControllerShouldIs(
        string $expected , string $method ,  array $methodArgs = [] , string $message = '' ,
    ):void{
        /** @todo create method for is _ instance of view -> solid -> create unit test for (method or class(facade)) => god i love you for this idea !!!!
         create view service class  or view helper class -> but before create test for it
         */
        $methodResult = $this->callStaticMethodFromController($method,$methodArgs);
        /** @todo if can  seperate to double method !!! */
        if ($methodResult instanceof View)
            $this->doCheckReturnedViewInControllerMethodIsExpected(
                $expected , $method , $methodResult , $message
            );
        else
            $this->fail(" method {$method}() from class {$this->namespace} doesnt return any view !!! ");
    }

    protected function doCheckReturnedViewInControllerMethodIsExpected(
        string $expected ,
        string $method ,
        View $view ,
        string $message ,
    ):void {
        // @todo may be move to view helper !!!
        $view = $view->name();
        /* @todo can create service or helper class -> function , facade , ..... for zero str length -> god thanks for this idea */
        if (strlen($message)==0)
            $message = $this->defaultMessageForUnexpectedViewThatReturnedFromControllerMethod(
                $method , $expected , $view
            );
        $this->assertEquals($expected,$view,$message);
    }

    protected function defaultMessageForUnexpectedViewThatReturnedFromControllerMethod(
        string $method , string $expected , string $actual , ...$params
    ):string {
        return "method {$method}() from class : {$this->namespace} returned {$actual} view !!! but you expected {$expected} view !!!";
    }
}
