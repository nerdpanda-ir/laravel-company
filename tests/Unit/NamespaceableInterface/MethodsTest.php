<?php

namespace Tests\Unit\NamespaceableInterface;

use PHPUnit\Framework\TestCase;
use App\Contracts\NamespaceableInterface ;

class MethodsTest extends TestCase
{
    protected string $namespace = NamespaceableInterface::class ;
}
