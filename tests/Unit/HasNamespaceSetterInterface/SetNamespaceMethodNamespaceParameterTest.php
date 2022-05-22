<?php

namespace Tests\Unit\HasNamespaceSetterInterface;

use PHPUnit\Framework\TestCase;
use App\Contracts\HasNamespaceSetterInterface;
class SetNamespaceMethodNamespaceParameterTest extends TestCase
{
    protected string $namespace = HasNamespaceSetterInterface::class ;
    protected string $method = 'setNamespace';
    protected string $parameter = 'namespace';
}
