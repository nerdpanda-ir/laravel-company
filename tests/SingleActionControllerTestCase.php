<?php namespace Tests ; ?>
<?php

use Illuminate\Contracts\View\View;
use Illuminate\Http\Resources\Json\JsonResource;
use Tests\ControllerTestCase ;
class SingleActionControllerTestCase extends ControllerTestCase {
    public function test_controller_has_invoke_method():void {
        $this->assertControllerHasInvokeMethod(
            "every single action controllers should have __invoke method \n but {$this->namespace} class dont have __invoke method !!!! "
        );
    }

    protected function callInvoke(array $controllerArgs = [] , array $invokeArgs = []) {
        return $this->callNoneStaticMethodFromController(
            '__invoke' , $invokeArgs , $controllerArgs
        );
    }

    protected function assertInvokeMethodReturnInstanceOf(
        string $expected ,
        array $controllerArgs = [] ,
        array $invokeArgs = [] ,
        string $message = ''
    ):void{
        $this->assertNoneStaticMethodInControllerReturnInstanceOf(
            $expected , '__invoke', $invokeArgs , $controllerArgs , $message
        );
    }

    protected function controllerHasInvokeMethod():bool {
        return $this->controllerHasMethod('__invoke');
    }

    protected function assertControllerHasInvokeMethod(string $message=''):void{
        $this->assertControllerHasMethod('__invoke',$message);
    }

    protected function assertInvokeMethodReturnViewInstance(
        array $controllerArgs = [] , array $invokeArgs = [] , string $message = ''
    ):void {
        $this->assertInvokeMethodReturnInstanceOf(
            View::class , $controllerArgs , $invokeArgs , $message
        );
    }

    protected function assertReturnedViewForInvokeMethodShouldIs(
        string $expected , array $controllerArgs = [] , array $invokeArgs = [] , string $message = ''
    ):void {
        $this->assertReturnedViewForNoneStaticMethodInControllerShouldIs(
            $expected , '__invoke' , $invokeArgs , $controllerArgs , $message
        );
    }

    protected function assertInvokeMethodReturnJsonResourceInstance(
        array $controllerArgs = [] , array $invokeArgs = [] , string $message = '' ,
    ):void {
        $this->assertInvokeMethodReturnInstanceOf(
            JsonResource::class , $controllerArgs , $invokeArgs , $message
        );
    }
}
