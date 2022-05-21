<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Contracts\HasNamespaceSetterInterface;

class SetNamespaceMethodInHasNamespaceGetterInterfaceTest extends TestCase
{
    protected string $namespace = HasNamespaceSetterInterface::class ;
}
