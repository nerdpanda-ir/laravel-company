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
}
