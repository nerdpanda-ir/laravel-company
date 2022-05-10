<?php namespace Tests ; ?>
<?php
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
}
