<?php namespace Tests ; ?>
<?php
use Tests\ControllerTestCase ;
class SingleActionControllerTestCase extends ControllerTestCase {
    public function test_controller_has_invoke_method():void {
        $hasInvoke = method_exists($this->namespace(),'__invoke');
        $this->assertTrue(
            $hasInvoke ,
            "every single action controllers should have __invoke method \n but {$this->namespace} class dont have __invoke method !!!! "
        );
    }

    protected function callInvoke(array $controllerArgs = [] , array $invokeArgs = []) {
        $controller = $this->controllerInstance($controllerArgs);
        return $this->app->call([$controller,'__invoke'],$invokeArgs);
    }

    protected function assertInvokeMethodReturnInstanceOf(
        string $expected ,
        array $controllerArgs = [] ,
        array $invokeArgs = [] ,
        string $message = ''
    ):void{
        /** @todo can in segregate method !!! */
        $controller = $this->app->make($this->namespace,$controllerArgs);
        $invokeResult = $this->app->call([$controller , '__invoke'],$invokeArgs);
        $this->assertInstanceOf($expected,$invokeResult,);
    }



}
