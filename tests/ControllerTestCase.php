<?php namespace Tests ; ?>
<?php
abstract class ControllerTestCase extends TestCase {
    protected string $namespace;
    protected function namespace() :string {
        return $this->namespace;
    }

}
