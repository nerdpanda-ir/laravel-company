<?php namespace App\Traits; ?>
<?php
trait HasNamespaceGetterTrait {
    public function namespace():string {
        return $this->namespace;
    }
}
