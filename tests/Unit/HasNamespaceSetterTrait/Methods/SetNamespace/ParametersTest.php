<?php

namespace Tests\Unit\HasNamespaceSetterTrait\Methods\SetNamespace;

use PHPUnit\Framework\TestCase;
use App\Traits\HasNamespaceSetterTrait;

class ParametersTest extends TestCase
{
    protected string $namespace = HasNamespaceSetterTrait::class ;
    protected string $method = 'setNamespace';
    
}
