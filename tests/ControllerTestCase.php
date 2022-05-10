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

    protected function controllerHasMethod(
        string $method , array $controllerArgs = []
    ) :bool {
        $controller = $this->controllerInstance($controllerArgs) ;
        return method_exists($controller , $method) ;
    }

    protected function assertControllerHasMethod(
        string $method ,
        array $controllerArgs = [] ,
    ):void {
        $methodIsExist = $this->controllerHasMethod($method,$controllerArgs);
        $this->assertTrue($methodIsExist);
    }
}
