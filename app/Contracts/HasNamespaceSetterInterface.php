<?php namespace App\Contracts; ?>
<?php
interface HasNamespaceSetterInterface {
    public function setNamespace(string $namespace):void;
}
