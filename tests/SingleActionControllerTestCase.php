<?php namespace Tests ; ?>
<?php
use Tests\ControllerTestCase ;
class SingleActionControllerTestCase extends ControllerTestCase {
    public function test_controller_has_invoke_method():void {
        $this->assertControllerHasInvokeMethod(
            "every single action controllers should have __invoke method \n but {$this->namespace} class dont have __invoke method !!!! "
        );
    }

    protected function callInvoke(array $controllerArgs = [] , array $invokeArgs = []) {
        return $this->callMethodFromController(
            false,
            '__invoke',
            $invokeArgs,$controllerArgs
        );
    }

    protected function assertInvokeMethodReturnInstanceOf(
        string $expected ,
        array $controllerArgs = [] ,
        array $invokeArgs = [] ,
        string $message = ''
    ):void{
        $invokeResult = $this->callInvoke($controllerArgs , $invokeArgs);
        $this->assertInstanceOf($expected,$invokeResult,$message);
    }

    protected function controllerHasInvokeMethod():bool {
        return $this->controllerHasMethod('__invoke');
    }

    protected function assertControllerHasInvokeMethod(string $message=''):void{
        $this->assertControllerHasMethod('__invoke',$message);
    }
}
