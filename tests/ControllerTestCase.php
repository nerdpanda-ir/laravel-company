<?php namespace Tests ; ?>
<?php
abstract class ControllerTestCase extends TestCase {
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
}