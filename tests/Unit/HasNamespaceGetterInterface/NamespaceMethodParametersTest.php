<?php

namespace Tests\Unit\HasNamespaceGetterInterface;

use PHPUnit\Framework\TestCase;
use App\Contracts\HasNamespaceGetterInterface;

class ParametersTest extends TestCase
{
    protected string $namespace = HasNamespaceGetterInterface::class ;
    protected string $method = 'namespace';
}
