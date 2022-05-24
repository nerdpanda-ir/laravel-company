<?php

namespace Tests\Unit\HasNamespaceSetterTrait\Methods\SetNamespace;

use PHPUnit\Framework\TestCase;
use App\Traits\HasNamespaceSetterTrait;

class SetNamespaceTest extends TestCase
{
    protected string $namespace = HasNamespaceSetterTrait::class ;
    
}
