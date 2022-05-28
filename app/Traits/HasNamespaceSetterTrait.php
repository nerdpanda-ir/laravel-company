<?php namespace App\Traits ;?>
<?php
trait HasNamespaceSetterTrait {
    public function setNamespace(string $namespace):void{
        $this->namespace = $namespace;
    }
}
