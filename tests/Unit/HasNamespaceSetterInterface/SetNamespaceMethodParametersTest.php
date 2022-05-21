<?php

namespace Tests\Unit\HasNamespaceSetterInterface;

use PHPUnit\Framework\TestCase;
use App\Contracts\HasNamespaceSetterInterface;

class SetNamespaceMethodParametersTest extends TestCase
{
    protected string $namespace = HasNamespaceSetterInterface::class ;
    protected string $method = 'setNamespace';
}
